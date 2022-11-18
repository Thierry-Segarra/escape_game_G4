const navbarCanvas = document.getElementById('navbar-grid')
const navbar = document.querySelector('#nav')
const navMenuButton = document.querySelector('#nav-menu-button')
const navbarCtx = navbarCanvas.getContext('2d')
const activePixels = []
const colors = ['#00fff0', '#00fff0', '#fae500', '#fae500']
const navHeight = 120
const mousePosition = { x: window.innerWidth / 2, y: navHeight / 2 }

let width, height
let isHovering = false
let menuIsToggled = false
let pixels = []
let currentPixel = 0

const drawNavbarGrid = () => {
  navbarCtx.clearRect(0, 0, width, height)
  
  pixels.map((pixel, i) => pixel[4] = 0)
  
  activePixels.map((item, i) => {
    let pixel = Math.floor(item.y / 10) * (Math.floor(width / 10) + 1) + Math.floor(item.x / 10)
    
    if (pixels[pixel]) {
      pixels[pixel][4] = item.color
      pixels[pixel][5] = item.alpha
    }
    
    if (item.alpha > 0) item.alpha -= 0.008
    if (item.alpha < 0) item.alpha = 0
    item.x += item.vx
    item.y += item.vy
  })
  
  pixels.map((pixel, i) => {
    navbarCtx.globalAlpha = 1
    navbarCtx.fillStyle = '#7000fa'
    navbarCtx.fillRect(pixel[0], pixel[1], pixel[2], pixel[3])
    navbarCtx.globalAlpha = pixel[5]
    navbarCtx.fillStyle = pixel[4]
    navbarCtx.fillRect(pixel[0], pixel[1], pixel[2], pixel[3])
  })
}

let activePixelAmountThreshold = 1

const activateNavbarPixel = () => {
  activePixels[currentPixel].x = mousePosition.x
  activePixels[currentPixel].y = mousePosition.y
  activePixels[currentPixel].alpha = 1
  currentPixel++
  if (currentPixel > activePixelAmountThreshold) currentPixel = 0
}

const drawNavbarCanvas = () => {
  isHovering && activateNavbarPixel()
  drawNavbarGrid()
  requestAnimationFrame(drawNavbarCanvas)
}

const initializeActiveNavbarPixels = () => {
  for (let i = 0; i < 300; i++) {
    activePixels.push({
      x: width/2,
      y: height/2,
      alpha: 0,
      color: colors[i % 4],
      vx: -1 + Math.random() * 2,
      vy: -1 + Math.random() * 2
    })
  }
}

const initializeNavbarCanvas = () => {
  width = window.innerWidth
  height = navHeight
  navbarCanvas.width = width
  navbarCanvas.height = navHeight
  pixels = []
  
  for (let y = 0; y < height / 10; y++) {
    for (let x = 0; x < width / 10; x++)
      pixels.push( [x * 10, y * 10, 8, 8, '#7000fa', 1])
  }
}

const handleNavbarSwipe = e => {
  e.preventDefault()
  mousePosition.x = e.touches[0].pageX
  mousePosition.y = e.touches[0].pageY
}

initializeNavbarCanvas()
initializeActiveNavbarPixels()
drawNavbarCanvas()

navMenuButton.addEventListener('mouseenter', () => activePixelAmountThreshold = 100)
navMenuButton.addEventListener('mouseleave', () => activePixelAmountThreshold = 1)

navbar.addEventListener('mousedown', () => activePixelAmountThreshold = 100)
navbar.addEventListener('mouseup', () => activePixelAmountThreshold = 1)
navbar.addEventListener('mouseenter', () => isHovering = true)
navbar.addEventListener('mouseleave', () => isHovering = false)
navbar.addEventListener('mousemove', e => {
  if (isHovering) {
    mousePosition.x = e.pageX
    mousePosition.y = e.pageY
  }
})
navbar.addEventListener('touchstart', handleNavbarSwipe)
navbar.addEventListener('touchmove', handleNavbarSwipe)
window.addEventListener('resize', () => {
  initializeNavbarCanvas()
})


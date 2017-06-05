let windowWidth = window.innerWidth
let windowHeight = window.innerHeight

// Scene
const scene = new THREE.Scene()

// Camera
const camera = new THREE.PerspectiveCamera(75, windowWidth / windowHeight)
camera.position.z = 300
scene.add(camera)

// House
const house = new THREE.Object3D()
scene.add(house)

const floor = new THREE.Mesh(
	new THREE.PlaneGeometry(400, 400, 1, 1),
	new THREE.MeshStandardMaterial({ color: 0x66bb66, metalness: 0.3, roughness: 0.8 })
)
floor.rotation.x = - Math.PI * 0.5
floor.position.y = - 50
house.add(floor)

const walls = new THREE.Mesh(
	new THREE.BoxGeometry(150, 100, 150),
	new THREE.MeshStandardMaterial({ color: 0xffcc99, metalness: 0.3, roughness: 0.8 })
)
house.add(walls)

const roof = new THREE.Mesh(
	new THREE.ConeGeometry(120, 60, 4),
	new THREE.MeshStandardMaterial({ color: 0x885522, metalness: 0.3, roughness: 0.8 })
)
roof.position.y += 80
roof.rotation.y += Math.PI * 0.25
house.add(roof)

const door = new THREE.Mesh(
	new THREE.BoxGeometry(2, 40, 20),
	new THREE.MeshStandardMaterial({ color: 0xff8866, metalness: 0.3, roughness: 0.8 })
)
door.position.x = - 76
door.position.y = - 30
house.add(door)

const bush1 = new THREE.Mesh(
	new THREE.SphereGeometry(10, 8, 8),
	new THREE.MeshStandardMaterial({ color: 0x228833, metalness: 0.3, roughness: 0.8 })
)
bush1.position.x = - 80
bush1.position.z = 20
bush1.position.y = - 45
house.add(bush1)

const bush2 = new THREE.Mesh(
	new THREE.SphereGeometry(8, 8, 8),
	new THREE.MeshStandardMaterial({ color: 0x228833, metalness: 0.3, roughness: 0.8 })
)
bush2.position.x = - 80
bush2.position.z = - 20
bush2.position.y = - 48
house.add(bush2)

// Lights
const doorLight = new THREE.PointLight()
doorLight.position.x = -102
doorLight.position.y = 0
doorLight.position.z = 0
house.add(doorLight)

const ambientLight = new THREE.AmbientLight(0x555555)
scene.add(ambientLight)

const sunLight = new THREE.DirectionalLight(0xffffff, 0.6)
sunLight.position.x = 100
sunLight.position.y = 100
sunLight.position.z = 100
scene.add(sunLight)

// Renderer
const renderer = new THREE.WebGLRenderer()
renderer.setSize(windowWidth, windowHeight)
document.body.appendChild(renderer.domElement)

// Mouse
const mouse = { x: 0.5, y: 0.5 }
window.addEventListener('mousemove', (event) =>
{
	mouse.x = event.clientX / windowWidth - 0.5
	mouse.y = event.clientY / windowHeight - 0.5
})

// Loop
const loop = () =>
{
	window.requestAnimationFrame(loop)

	// Update house
	house.rotation.y += 0.005

	// Update camera
	camera.position.x = mouse.x * 300
	camera.position.y = - mouse.y * 300
	camera.lookAt(house.position)

	// Render
	renderer.render(scene, camera)
}

loop()
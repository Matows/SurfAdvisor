import * as THREE from './three.js-r123/build/three.module.js'
import {GLTFLoader} from './three.js-r123/examples/jsm/loaders/GLTFLoader.js'
import {OBJLoader2} from './three.js-r123/examples/jsm/loaders/OBJLoader2.js'
import {TGALoader} from './three.js-r123/examples/jsm/loaders/TGALoader.js'
import {OrbitControls} from './three.js-r123/examples/jsm/controls/OrbitControls.js'


const canvas = document.querySelector('#c');
const renderer = new THREE.WebGLRenderer({canvas});

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );


renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

const gltfLoader = new GLTFLoader();
const url = "/nuitinfo/js/models/table.obj";

camera.position.z = 300;
var controls = new OrbitControls( camera, renderer.domElement );
controls.enableDamping = true;
controls.campingFactor = 0.25;
controls.enableZoom = true;

var keyLight = new THREE.DirectionalLight(new THREE.Color('hsl(30,100%,75%)'), 1.0);
keyLight.position.set(-100,0,100);

var fillLight = new THREE.DirectionalLight(new THREE.Color('hsl(240, 100%, 75%)'), 0.75);
fillLight.position.set(100, 0, 100);

var backLight = new THREE.DirectionalLight(0xffffff, 1.0);
backLight.position.set(100, 0, -100).normalize();

scene.add(keyLight);
scene.add(fillLight);
scene.add(backLight);

const OBJLoader = new OBJLoader2();
OBJLoader.load('/nuitinfo/js/models/table.obj' , function (object){
    object.position.y = 0;
    scene.add(object);
},null,null,null);
const skyboxloader = new THREE.TextureLoader();
const bgTexture = skyboxloader.load('/nuitinfo/js/models/skybox.jpeg');
scene.background = bgTexture;
const loader = new TGALoader();

// load a resource
const texture = loader.load(
	// resource URL
	'/nuitinfo/js/models/Wood.tga',
	// called when loading is completed
	function ( texture ) {

		console.log( 'Texture is loaded' );

	},
	// called when the loading is in progresses
	function ( xhr ) {

		console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );

	},
	// called when the loading failes
	function ( error ) {

		console.log( 'An error happened' );

	}
);

const material = new THREE.MeshPhongMaterial( {
	color: 0xffffff,
    map: texture
} );
const OBJLoader1 = new OBJLoader2();

OBJLoader1.load('/nuitinfo/js/models/cup_mul.obj' , function (object){
    object.position.y = 82;
    object.position.x = 50;
    scene.add(object);
},null,null,null);

const OBJLoaderballe = new OBJLoader2();

OBJLoaderballe.load('/nuitinfo/js/models/sphere.obj' , function (object){
    object.position.y = 97;
    object.position.x = -40;
    scene.add(object);
},null,null,null);
var animate = function () {
    requestAnimationFrame(animate);
    
    controls .update();

    renderer.render(scene,camera);
}
animate();

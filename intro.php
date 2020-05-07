		
		<div id="enterholder">
		<div id="enter" onclick="killIntro();"></div>

		<script>

			var text  = 'ENTER...';
			var enter = document.getElementById("enter")
			var i = 0;
			(function nextLetter(){
				enter.innerHTML = text.substr(0, ++i);
				if(i < text.length){
					setTimeout(nextLetter, 200);
				}
			})()
		</script>

		</div>

		

		<div id="webgl-container"></div>
		
		<script>
			var camera, controls, scene, renderer,head,eyeL,eyeR;
			var renderSize = {w:window.innerWidth, h:window.innerHeight};
			var position = new THREE.Vector3( 1, 0, 0 );
			//var renderSizeW = window.innerWidth;
			//var renderSizeH = window.innerHeight;
			//renderSize.w = 
			
			var isSmall = false;
			var canTransition = true;

			init();
			animate();

			function init() {
				//scene = new THREE.Scene();
				//scene.fog = new THREE.FogExp2( 0xcccccc, 0.002 );
				renderer = new THREE.WebGLRenderer({alpha:true});
				
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				var container = document.getElementById( 'webgl-container' );
				container.appendChild( renderer.domElement );


				//controls.addEventListener( 'change', render ); // add this only if there is no animation loop (requestAnimationFrame)
				
				// lights
				
				var loader = new THREE.ObjectLoader();
    			loader.load("3d/head.json", function (result) {
    				
    				camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 600 );
					camera.position.z = 500;
    				scene = result;

					controls = new THREE.OrbitControls( camera, renderer.domElement );

    				head = scene.getObjectByName("skin_hi");
    				eyeL = scene.getObjectByName("eyeL_hi");
    				eyeR = scene.getObjectByName("eyeR_hi");
    				// hat  = scene.getObjectByName("hat");

    				console.log(head);
    				var s = 0.6;
    				head.scale.set(s,s,s);

    				var texture = new THREE.TextureLoader().load( 'imgs/Head_skin_hi.jpg' );
    				var eyeLtext = new THREE.TextureLoader().load( 'imgs/Head_eyeL_hi.jpg' );
    				var eyeRtext = new THREE.TextureLoader().load( 'imgs/Head_eyeR_hi.jpg' );

    				head.material = new THREE.MeshBasicMaterial( { map: texture } );
    				eyeL.material = new THREE.MeshBasicMaterial( { map: eyeLtext } );
    				eyeR.material = new THREE.MeshBasicMaterial( { map: eyeRtext } );
    				// hat.material  = new THREE.MeshPhongMaterial

    				light = new THREE.DirectionalLight( 0xffffff );
					light.position.set( 1, 1, 1 );
					scene.add( light );
					light = new THREE.DirectionalLight( 0x002288 );
					light.position.set( -1, -1, -1 );
					scene.add( light );
					light = new THREE.AmbientLight( 0x222222 );
					scene.add( light );

					head.position.x = 0;
					head.position.y = 30;
					head.rotation.y = 360;

					// var position = { z : -100 };
					// var target   = { z :   90 };

					// var tween = new TWEEN.Tween(position).to(target, 4000);
					// var tween = new TWEEN.Tween(rotation).to(ry, 4000)
					// tween.start();
					// tween.onUpdate(function(){
					// 	console.log("Tween is updating")
					//     head.position.z = position.z;
					// });
    			});
    
				
				window.addEventListener( 'resize', onWindowResize, false );

			}

			function resizeRenderer(makeSmall){
				
				isSmall = makeSmall;
				
				if(!isSmall){ //making it big
					
					$('#webgl-container, #intro').css("pointer-events", "auto")
					renderer.domElement.style.pointerEvents = "auto";
					controls.enabled = true;
					$("#links-holder").fadeOut("slow");
					$("#intro").css("z-index", "10");
					$("#index").css("z-index", "0");
					$("#links-holder").css("z-index", "0");
					$("#holder").css("z-index", "0");

					if($("#content").length>0){
						
						$("#content-holder").fadeOut("slow", function(){
							$("body").remove("#content");
						})
					}

					$("#enterholder").fadeIn("slow")

				}else{ // making it small

					$("#enterholder").fadeOut("slow")
					//$("#webgl-container").css("pointer-events", "none");
					renderer.domElement.style.pointerEvents = "none";
					$('#webgl-container, #intro').css("pointer-events", "none")
					$("#links-holder").fadeIn("slow");
					controls.enabled = false;

					$("#intro").css("z-index", "0");
					$("#index").css("z-index", "10");
					$("#links-holder").css("z-index", "10");
					$("#holder").css("z-index", "10");

				}

				if(canTransition){
					canTransition = false;

					$("#webgl-container").fadeOut("slow", function(){
						onWindowResize();
						$("#webgl-container").fadeIn("slow", function(){
							canTransition = true;
						});
					})
				}
				
			}

			function onWindowResize() {
				
				if(!isSmall){
					renderSize.w = window.innerWidth;
					renderSize.h = window.innerHeight;					
					camera.fov = 60;
					$('#intro').css("top", "0px")
					$('#intro').css("left", "0px")
				}else{
					camera.fov = 30;
					controls.reset();
					renderSize.w = 200;
					renderSize.h = 200;
					$('#intro').css("top", "350px")
					$('#intro').css("left", "-30px")
				}
				
				camera.aspect = renderSize.w / renderSize.h;
				camera.updateProjectionMatrix();
				
				renderer.setSize( renderSize.w, renderSize.h );

			}



			function animate() {

				requestAnimationFrame( animate );
				
				if(controls && !isSmall){
					console.log("updating controls")
					controls.update(); // required if controls.enableDamping = true, or if controls.autoRotate = true
				}


				if(scene && camera){
					render();
				}
				
			}

			function render(){
				renderer.render( scene, camera );
				head.rotation.y += 0.01;
				//TWEEN.update();
			}
			
		</script>

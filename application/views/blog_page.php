<!doctype html>
<html lang="en" data-bs-theme="auto">
	<head>
    	<script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>

    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<title>Blogs</title>

    	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    	<link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" 
			rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    	<style>
			.bd-placeholder-img 
			{
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
      		}

	    	@media (min-width: 768px) 
			{
        		.bd-placeholder-img-lg 
				{
          			font-size: 3.5rem;
        		}
      		}

			.b-example-divider 
			{
				width: 100%;
				height: 3rem;
				background-color: rgba(0, 0, 0, .1);
				border: solid rgba(0, 0, 0, .15);
				border-width: 1px 0;
				box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
			}

			.b-example-vr 
			{
				flex-shrink: 0;
				width: 1.5rem;
				height: 100vh;
			}

			.bi 
			{
				vertical-align: -.125em;
				fill: currentColor;
			}

			.nav-scroller 
			{
				position: relative;
				z-index: 2;
				height: 2.75rem;
				overflow-y: hidden;
			}

			.nav-scroller .nav 
			{
				display: flex;
				flex-wrap: nowrap;
				padding-bottom: 1rem;
				margin-top: -1px;
				overflow-x: auto;
				text-align: center;
				white-space: nowrap;
				-webkit-overflow-scrolling: touch;
			}

			.btn-bd-primary 
			{
				--bd-violet-bg: #712cf9;
				--bd-violet-rgb: 112.520718, 44.062154, 249.437846;

				--bs-btn-font-weight: 600;
				--bs-btn-color: var(--bs-white);
				--bs-btn-bg: var(--bd-violet-bg);
				--bs-btn-border-color: var(--bd-violet-bg);
				--bs-btn-hover-color: var(--bs-white);
				--bs-btn-hover-bg: #6528e0;
				--bs-btn-hover-border-color: #6528e0;
				--bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
				--bs-btn-active-color: var(--bs-btn-hover-color);
				--bs-btn-active-bg: #5a23c8;
				--bs-btn-active-border-color: #5a23c8;
			}

			.bd-mode-toggle 
			{
				z-index: 1500;
			}


			/* Hide the modal box by default */
			#modal-box 
			{
				display: none;
				position: fixed;
				z-index: 1;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgba(0,0,0,0.4);
			}

		</style>
  	</head>


	<body>
    	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="check2" viewBox="0 0 16 16">
				<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
			</symbol>

			<symbol id="circle-half" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
			</symbol>

			<symbol id="moon-stars-fill" viewBox="0 0 16 16">
				<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
				<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
			</symbol>

			<symbol id="sun-fill" viewBox="0 0 16 16">
				<path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
			</symbol>
    	</svg>

    	<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      		<button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
				id="bd-theme"
				type="button"
				aria-expanded="false"
				data-bs-toggle="dropdown"
				aria-label="Toggle theme (auto)">

        		<svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        		<span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      		</button>

      		<ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        		<li>
          			<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#sun-fill"></use>
						</svg>
							Light
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
          			</button>
				</li>

				<li>
					<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#moon-stars-fill"></use>
						</svg>
							Dark
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
					</button>
				</li>

				<li>
					<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#circle-half"></use>
						</svg>
							Auto
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
					</button>
				</li>
			</ul>
		</div>

    
		<header data-bs-theme="dark">
			<div class="collapse text-bg-dark" id="navbarHeader">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-md-7 py-4">
							<h4>About</h4>
							<p class="text-body-secondary">
								Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.
							</p>
						</div>
						
						<div class="col-sm-4 offset-md-1 py-4">
							<h4>Contact</h4>
							<ul class="list-unstyled">
								<li>
									<a href="#" class="text-white">Follow on Twitter</a>
								</li>
								<li>
									<a href="#" class="text-white">Like on Facebook</a>
								</li>
								<li>
									<a href="#" class="text-white">Email me</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="navbar navbar-dark bg-dark shadow-sm">
				<div class="container">
					<a href="#" class="navbar-brand d-flex align-items-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
						<strong>Album</strong>
					</a>
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="nav-link" href="<?=base_url().'admin/login/logout' ?>">Sign out</a>
				</div>
			</div>
		</header>

		<main>

			<section class="py-5 text-center container">
				<div class="row py-lg-5">
					<div class="col-lg-6 col-md-8 mx-auto">
						<?php	
							echo '<h1> Hello '.$username[0]->userName.'</h1>';
						?>
						<h3 class="fw-light">Articles</h3>
						<p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
					
						<p>
							<strong> 
								<?php 
									$num=sizeof($result);
									if ($num == 1) 
									{
										echo " 1 article";
									} 
									else
									{
										echo " $num articles ";
									}	
								?>
							</strong>
						</p>
					</div>
				</div>
			</section>

			<div class="album py-5 bg-body-tertiary">
				<div class="container">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> 

						<?php
							foreach ($result as $key => $value) 
							{
						?>
							<div class="col-md-4">
								<div class="card shadow-sm">
									<img
										class="card-img-top"
										src=" <?= base_url(). $value['blog_img'] ?> "
										height="200"
										width="100"
									>
									<div class="card-body">
										
										<p class="card-text">
											<?= $value['blog_title']?>
										</p>

										<div class="d-flex justify-content-between align-items-center">
											<a
												href=<?= base_url().'home/blog_details/'.$value['blogid'] ?>
												class="btn btn-sm btn-outline-secondary">
												View
											</a>

											<!-- Button to open the modal box -->
											<button 
												class="open-modal-btn btn btn-primary" 
												data-toggle="modal" 
												field_id='<?php echo $value['blogid']; ?>' 
												data-target="#modal-view"
											>
												Open Modal
											</button>
											
										</div>
									</div>
								</div>
							</div>
							
						<?php		
							}
						?>
						
					</div>
				</div>
			</div>
		</div>
		</main>
		
		<footer class="text-body-secondary py-5">
			<div class="container">
				<p class="float-end mb-1">
					<a href="#">Back to top</a>
				</p>
			</div>
		</footer>

		<!-- The modal box -->
		<div 
			class="modal fade" id="modal-view" tabindex="-1" role="dialog" 
			aria-labelledby="modal-box-title" aria-hidden="true"
		>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-box-title">Article</h5>
						<button type="button" class="close" data-dismiss="modal" 
						aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<!-- Placeholder for the Ajax response -->
						<div id="modal-content-placeholder">
							Loading...
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" 
			integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    // Attach a click event listener to the button
    $(".open-modal-btn").click(function() 
        {
            // Make the Ajax request
            var blogid= $(this).attr('field_id');
            // alert(blogid);
            $.ajax(
                {
                    url: "home/blog_details/"+blogid,
                    type: "POST",
                   
                    success: function(response) 
                    {
                        // Update the content of the modal box
                        $("#modal-content-placeholder").html(response);
                        // Open the modal box
                        $("#modal-view").modal("show");
                    },

                    error: function() 
                    {
                        // Handle errors
                        $("#modal-content-placeholder").html("Error loading content.");
                        $("#modal-view").modal("show");
                    }
                }
            );
        }
    );

</script>
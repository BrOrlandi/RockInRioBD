<!DOCTYPE HTML>
<HTML>

	<!-- ================================
					HEADER
		 ================================ -->
	<HEAD>
		<!-- Metadate -->
		<META charset="UTF-8" />
		<META name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<!-- Title -->
		<TITLE>Minha Conta - Rock in Rio 2013</TITLE>
		
		<!-- Reference for 'css' -->
		<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
		<LINK rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.css"/>
		<LINK rel="stylesheet" href="../css/bootstrapjoin.css"/>
		<LINK rel="stylesheet" href="../css/sidebar.css"/>



<!-- ================================
				SCRIPTS
	 ================================		 
	 Eles são colocados no rodapé da página para que o documento seja carregado mais rápido.
 -->

		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../js/jquery-2.0.1.min.js"></script>
		<script src="../js/navbar_login.js"></script>
		<script src="../js/scrollspy.js"></script>
		<script src="../js/affix.js"></script>
		<script src="../js/bootstrap-alert.js"></script>
		<script src="../js/bootstrap-button.js"></script>
		<script src="../js/bootstrap-collapse.js"></script>
		<script src="../js/bootstrap-modal.js"></script>
		<script src="../js/ga.js"></script>
		<script src="../js/bootstrap-scrollspy.js"></script>

	</HEAD>

	<!-- ================================
					  BODY
		 ================================ -->
	<BODY data-spy="scroll" data-target=".bs-docs-sidebar">
		
		<!-- Include for Navigation bar -->
		<?php require($_SERVER["DOCUMENT_ROOT"] . "/rockinriobd/navbar.php"); ?>
		
		<!-- Hero-unit bases -->
		<div class="hero-unit">
			<h1>Minha Conta</h1>
			<p><?php $nome = $_SESSION['nome'];	 ?> Logado</p>
		</div>
		
		<!-- Containers for informations -->
		<div class="container">
			<div class="row-fluid">
				
				<!-- Side Bar -->
				<div class="span3 bs-docs-sidebar">
					<ul class="nav nav-list bs-docs-sidenav">
						<li ><a href="#dashBoard"><i class="icon-chevron-right"></i>DashBoard</a></li>
						<li ><a href="#anotherinfo1"><i class="icon-chevron-right"></i>Info1</a></li>
						<li ><a href="#anotherinfo2"><i class="icon-chevron-right"></i>Info2</a></li>
						<li ><a href="#anotherinfo3"><i class="icon-chevron-right"></i>Info3</a></li>
					</ul>
				</div>

				<div class="span9">



        <section id="dashBoard">
          <div class="page-header">
            <h1>DashBoard</h1>
          </div>

          <div class="row-fluid">
          	<?php require($_SERVER["DOCUMENT_ROOT"] . "/rockinriobd/php/consultas_admin1.php"); ?>
          </div>
        </section>



        <!-- File structure
        ================================================== -->
        <section id="anotherinfo1">
          <div class="page-header">
            <h1>2. Info1</h1>
          </div>
          <p class="lead">Within the download you'll find the following file structure and contents, logically grouping common assets and providing both compiled and minified variations.</p>
          <p>Once downloaded, unzip the compressed folder to see the structure of (the compiled) Bootstrap. You'll see something like this:</p>
<pre class="prettyprint">
  bootstrap/
  ├── css/
  │   ├── bootstrap.css
  │   ├── bootstrap.min.css
  ├── js/
  │   ├── bootstrap.js
  │   ├── bootstrap.min.js
  └── img/
      ├── glyphicons-halflings.png
      └── glyphicons-halflings-white.png
</pre>
          <p>This is the most basic form of Bootstrap: compiled files for quick drop-in usage in nearly any web project. We provide compiled CSS and JS (<code>bootstrap.*</code>), as well as compiled and minified CSS and JS (<code>bootstrap.min.*</code>). The image files are compressed using <a href="http://imageoptim.com/">ImageOptim</a>, a Mac app for compressing PNGs.</p>
          <p>Please note that all JavaScript plugins require jQuery to be included.</p>
        </section>






				</div>
			</div>
		</div>

<!-- ================================
				  FOOTER
	 ================================ -->

		<footer class="footer">
			<div class="container">
			Footer - Colocar algum footer aqui =)	
			</div>
		</footer>

		

	</BODY>
	
</HTML>


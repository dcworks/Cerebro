<?php
/*
 * @package WordPress
 * @subpackage CEREBRO
 * @since CEREBRO 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>

<!-- Charset -->
<meta charset="<?php bloginfo( 'charset' ); ?>">

<!-- Description -->
<meta name="description" content="<?php echo get_option('cb_description'); ?>">
<meta name="keywords" content="<?php echo get_option('cb_keywords'); ?>">

<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );

	bloginfo( 'name' );
	
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );

	?></title>

	<!-- 
	CEREBRO - BROUGHT TO YOU BY THE FOLKS @ DC 
	h33X2225isrrr;:,..............,::;rsr:,..    ..,,:;;rsSS52Sr;;:.  .,;iSis;:,...,:rsi522X33XXX5isr;:,......  
	h522S522issrr;:,                 ..:,   .:rXA#@@@@@@@@#MMMM##@#BXs:.           .:;rrsriSS5Sir;;:..          
	9Xh9XXX3h925SSir;,,.............  .:r9#@@@@@@@@@@@#MHAAh9hGAHM#@@@@@B2;     ..,;rssr;rssssrr;:,..........., 
	9X&&hh3XhG93255Sr;:,,........  .;5M@@@@@@@@#MBHAA&933XXXX999hGh&AHBM@@@@#2,   .::;::::;;;::,.. .  ......,,,.
	9X9hGG9333hG92S22i;:,......  ,sM@@@@@@@##MHA&&hhhhh9hh999999hh99G&&&AB#@@@@M;   .,,,,..,.       ........,,:,
	9522X39hh9hGh3222Sr;,....  :3#@@@@@@#MBHAAA&&h9hhGGhGGhhGhhhG&GhG&GGAAAB#@@@@@s   ....          .. ....,,:;;
	9X3XiS5Xhhh93hX25isr:..  rH####@@#MMMMBBAA&A&GG&GG&&G&GGA&GG&A&GG&&AAAAABM##@@@#:         .   ......,,:;;sir
	9XG93X22SiS233X55is;:. ,h@BG9A#@##MMMHAHAAAAAAAAA&AA&&A&&AAAAA&AAAHAAHMMBMM#@@@@@X    . .. .......,,::;ri22S
	X239h2X92s;:;sS5ir;:, s@B223GB#####BHHHAHAAAAAAAHAAHHAAAAAAAAAHAAAHHHMBMBM###@@@@@B   .... ......,::;riS23h2
	2293X39X3h2s;:,:,,,. 2@XSi5X&M###MMBBBHHHAAAHAHHHHHHHHHBHHHHHHHBHHBBHBBM##M###@@@@@#  .........,::;ri23h933X
	is2X3XXX9hh92s;,..  5BsrsSXGB##@#MBBMBHHHAAHHHBHBBBBBHHHHHHHBBBBBHBBMBBM#MMMMM#@@@@@B   .....,,:;;s5hGGh3XX2
	;,;rsS52X3XX555i;, sBrrrrSA########BBBHBHAAAHHHAAAHHHAAAHAAAAAHBBBBBBMBMMM#MBBBM@@@@@X  ...,,:;riS2h&h933h92
	, ,,,::;rsisiirr:.;#rrr;rSG########MMBHAAA&A&&&GhhG&&G99hGGGGhhG&GAAABMM#MMMBBHB#@@@@@. ..,:;rsS5XGh93h325sr
	. ......,,::;;:,. H2;:;;sS3B##@@###MMBHAAA&&Gh93XXX2X255S5SS5S52XXX3hAAHBBBMBHHHH#@@#@h  .:;rrs552222Ss;:,.,
	. .       ...... ;#;:;:;ri&##@@@###MBMMHAAA&GXX225SSissrrrrrrrriiS5S5XhAAHBBBBHAAM#@#@@  .,:;riir;;:,.    .,
	, ,............. 22:;;;ri5H#@@#@###MMMBAAAhXX5SiSSir;;;;;;;;;;;;;rsii5X9&AHHBMHAAH#@@@@, ..,,::,.     .,;rir
	r;r;::,......... Xr,:::;S2&#########MBHA&GXiiSsrssr:::,,,.,,,,,,,:;rsi23hAAAHBHAAAB#@@@; ...     .,:;s5XGAG5
	23&GX2ir;:,,,... X;..,,;i5XB#######MBHHA92isr;:::,,,,,,.,.. ....,:;rrsi29AHHBMBHAAH#@@@s      .,;s2XGAAGGGX5
	X9AAAHH&32s;:,.. 9;   .;iSXMMM#####MBBHA32sr:,,,,,,,,,,,,,. ....,,:;rsSX3GHHBMBHAAHM@@@9  ...:;rS2XhAA3X3hh2
	3X9hh&AAA&hSr:,. 3:.:,:r23H@@#######MBHAGXir;:::,,,,,,,,,,,..,,,,::;rs23hABHBMBHAAAB@@@G  ..,:;rrsS2XXX339X5
	X2399GhG&hXir;,..2;,,.,s&A#@@@@@####MHAAG325isrrrrr;;;;;;rr;;;;;;;;;riSXGAHBBBHAAAAB@@@X  ...,:;;rrrrri52525
	Si2555SSSisrr:,. S:   ;5SiiXH@@@@###MMHAG9Xirrrrrrrrrrrrrr;;;;;rrrrrriS2hHBBHAHA&AAB#@@2  ....,,:;;ri22222X2
	: ,........,,..  i, .;;.    ;9#@######BAh3Sr;:::,,,,,,,,,,,,...,,:;;ri29AHHHHAHB&&AB#@@X  . ...,;rri23225225
	:        ...,..  s..r, .;rs;:;&######M##H9s;;;;:::,::,,.,:;::,,,.,,:s29hAABMHAABAAAB##@G  . ...,;rssSS52552S
	sriSSSSissrrr,.. ;,:. r3S3&BAr;h#@@@######ASr:,....,,,..,;sSi;:,,,;r52XX&ABBHAAHHAAB@#@h    ...,,;;;;;;rrrrr
	XGAAHHA&GhXSi;,. ;:, ;2.,ri3H#h2hM#@@@@@##@@#AXir;:,,....:s52Srrrr2SS23AHHBBHAAHHAAM##@5        ...........,
	9h&hhGGG93X5i;,  ,; .i.,X9X3H#@@#M####@@@###MHB##M3sr;;:,,;i5X2G325S2AHBBHBBBHAHHAH###@: SH3.              .
	9X93939h9X5i;;GA: ; .irr;: ..,;XB#@####@@#MAA3X39&Gs,,::::s2XXXi;;s&#MAAAHHHMMHAAAH###@;@@9@S ,:,:,,...   . 
	323X25isr;,. ::iBS,,r:  .:s52X22XAB######@@#H9s;rsS2Ssrrri35s;::r2B#AGAHHBHHM##HAAH###@@M;@@:.riS2SSissr;;;,
	5rr;:,.     .,&@r3#;, :9H#@@@@@@@#####MBBM#@@@@A;:,:ri222i;,,:s9#@#23AHHHBHAHM#MHHB#M#@G #@# .;iXXXhG&&G9XXr
	;       .,,;;,2@@;9A rGr;:,:i3H#@@@@##BMBHAAAH#@@A;.r29Xs,.;S&@@M3iX3AMMMHAAAH#@#BMMM@H X@@@  .:;s23hA&AAGGS
	,  ..,:rs5S25::Hs@:G:2:.,22r,.,ihB##@#BHAAhG92X9M@@3ABAAMX:X&3s;;;ihhHM##HAGH@@@@@BMM@,r@:.@. ,,,;riSS2X99h2
	:.:;riXGAAGX5;:i @@;srs:;##@@@5;r2A###MHA&3XXSr;r5M@AXX23Bi;::;;;:sAAHM##MAH@@###@@#@2.@@X &: ;rrsss2222XX22
	rr2h&HHAG&GhXr2;.@@Srr.;h@2:r@@@HX2GM##M##BGSis;,,;5s.;i:;3;.,:::i25hBM##@@@@HAAH#@#@S2@@@:h; r2X3XX99h939X2
	23AAAG9XhGhX5r9,;@@#r3H@@r .2hH@@@#BH##MM##@#A92;..;;  :, rA,,:r22;S&BH#@@@MGhhGA#@#@@#H@H:#,.r9h93hhh2X939X
	hh93X399X5Ssr,i:,@#rG@@#i.rA@S9@A#@@@##MHAh92h#Ms,:Sh:,;;,i@2,;SXs5&HM#@@M&9GGA##B&A#@AB@:2B .;i252X9h22333X
	G9X2X9X2Sir:,.;s X,r@@r.i@@@&5@B3X9H#@@#MB9X5;:i95.h@3rsii2@@h2X9&A#@@@####@@@M3553A#@H@sr@. ..:;rsS22222222
	3S23X5isr;:..  2r,,@@, ;@@@35@@@@@#BB#@@@#BhhGisAB:H@BAHBAAH@###@@@@@@#@@@#@@@X;ri2GB@2:s@s  ...,:;rsiS22222
	h25Sssr;:,..  .G:,@@  r#@@22@#H#@@@@@@H@@@@@@@#BB2i#@#@####H@@@@@@hrX@XA#s;XGM; .;iXA@s9iA:      .,:;ri52222
	3isrr:,..... ,9,:M&.;iX@@2h@#GsA@M2s##X@#A&@@@@@@#@@#M#M##M#@Bh3Sh5i;rrriSAA@@;:;sXA#@is;&G :525, ..,:;riS5S
	5r;:,,,...  :9,:B; iX,:A&h@@Bi ,@GSrrr:r;;rX9XB#@@@####M#B#@X ;rr59&M####@@@G;;:r2AB@@GXH@irh. s@: ..,,:;rri
	s:,.....   ;h.,A, Xs :A5@@@@#A5:S@@#M&9X&HGX53A,3@@MGGG&&H@A:.;.,X#H3XA##Bhs:;iSiXHM@##@@rr@2:;2@@  ...,,:;r
	;.....   ,r2::h..5isSHHSrG@@@@X: ,X#####HAAB@@s  i#@HisS9@@3rrX;  ;A#G: ,;;:;sXAhA#@@A    @Hs5#@@@.  ....,,:
	:.. ..  sAr,ih, 2.S@@H2i .A@@@HXrrr;.:r5&#@@Bs;; :M@#XsiG@@#9X&Ar. :3#Mr,:;;;;s2AH@@MM   ;@iiH@#@@:  ......,
	, ..  :Xi,;S2;.2.s@@Ai#:  ,G@@@BA&2X9&HM#H5;::;i;i#@@&ss9@@##B&H&r,,r9H@@@#2ri2hM@@##@   SH5&#BMM@:    .....
	. .  r9: :S3.:X:r@@HSAi,   .h@@@B5i3AHBX;..,. ,i99M#@BSrh##BMBAAXr;:;r5hHH##X3A#@@M@@@,  GAA&AAAh@,      ...
	.  ,52. ;X3;,52&@@H9#& r  .  2M@@#G5rr;;;r:..:r3&9H##HSsG#MAHA&9S;:,..,;r2ABHH#@#AA@#@:  9#&hGGhG@:       . 
	. :As .s32: s.i@@#G#@  s, rX  ;3M@@#Xs:,;rsrrShMMH&H#BSrh#BHAAGh2;:,,,,,:rXAM##M&hB@#@;  3@@#BAhB@,         
	..&: ,S9S, rs;;&MSS@;  ;; rM#: ,r5H@@#H2sriXhABM##HB#HSrh#BBBH&&3i;,,::;rrSAHHBh5hM@#@;  ,;XH#@#M@:  .      
	rS: ;3Xr. ;,s@@#hX@A   ,r :3M@i  .s#@@@@A3hGhAHAB####Hr:&###M2rsX9S;:,,:ri2AAB3s2h#@#@@G:, .,:ri5@:         
	r,,s3i:  rr.i@BhXA@, ...s .sA@@X   5@@@@MA&G&A&AB##@#H;:AM###2:..,;rr;::;rSABASSXhM@#@@@@; r3G2i3@s         
	, ;ir,.,rX,h@@5s5@B  .. S: ;2H@@A  r@@###AG&HHH#@#H##Ar ;GHM&#@AGS,.:ris;;iAB2iX9&#@H@@@@s iMMHXX@& .5#@@@A:
	::r;::rh::2@@3i3#@  ..  r5 ,r2#@@# ;@@@##HAAAAH@HXrHM2.  s&BiX@rrM#i,:r5srihAii3GA##A@@@@S;9#@M32@& MMH@@@@B
	:...,rr;:r@@&hA#@;    :A@@,.;sG@@@h:@@###HAAh3h@#G2GH2; :r3MB@#. .3@9;;iSiiGhiS3GA#MM@#@@23#B##AG#M:3   .siA
	. ,:s; .X@@BHM#@@,  ;@@@@@A::;SH@@@;h2M##BAAhhhA@@@@MAh5X9#@@@Xrrr;9A5iSSriG2i5hAB#MM@##@hX#M##MM#@@Br;::, 2
	,,;s;  5@@352iH@@ .#@@@#@@GH;:r2#@@X.,#@#BAHBAAHH::H@@@@@@MABM2SXXSi33S5r;S3229GA###3@##@hhBAM@@@#@@@MABMAA&
	::r: .i@@A2X2G@@s;@@MG&M@@ ,#S;r3#@#  B@#BG9GHH9r,r9M@32A,:hM#AAHBH9399i:;2X2hGA###hX@##B sAB&9AA&#@@@@@AH@B
	:.:::i@@MAHMM@@@#@@AXh&H@@;  G3;rA@@. 2@#3;:;r::;3h&95.:X,,Xh39hhhG&GX&A:;2X3h&#@@H2H@M@X ;rr;;rs9#@#@@@..2M
	:,rr:G@@##@#@@@@#H&9XXGA@@&   sG;rM@X r@@9X3AX:rXA&AHASsir9@@@##H&G&9irG;;29hA@@#Ah5#@M@3 .:;;r5hB####@: S&H
	rr2r  SM@#95###M3XX93X3H@@@,   :Hrr@@  #@#HB@@@@@@@@@@@@@@@@@##@@@@@#M@9:r39M@@@GG&r@@B@A .,,,:5AM###@h    r
	Sir:rSi9#ASGA:AHr29&AG9A#@@9,    G5r#5 2@@##@h9M##@#&XH###HHA3&BH&2s;;	h&#@@#SXh2S@#H#B.,,:;r3B#@A3#; :rSS
	s,,:;iXMA55A& h@si9GHG9&B@@M3,    S3s3,s@@@#5;;;;;ri52iiSisssisr;;:rriXB#M@@##rrh9ih@BAM@;;::;5A###AiB:,XM#G
	;.,::2#M3iX#H 2@Bs53&A&9A#@A#5.    rAsr:#@##3S5XhXX559A####MH9X2229hAB##M#@#@r;i99i#@A&#rrsrrih##BMMih,s###&
	:.;:r9@@HM@@;:BAhM@@A3G9hA@@9i3Xs;iG##BX. .&@@@#HBBMA3XX99XX3GAHBBM#H5rSM@@;.r52irG@#XM;..,;r;:::;r:;2@@@##A
	;;r2@@#A&33@3SMBXr2B@#A&&AA;.r9#@@#@@S5@A  ,9@@@#HS;,;s9A&&A2;..:s23, SB@#:.sSr;;s@@Ah#;,,,..    ;;, ,rhB##B
	rrh@@@3si5G@XSMBHr:r2#@#M#:.2H@@@@#5rs@,:A  ,&@@#Air:. ,:.,r; .:s5AM:5#@A.,rir::sS@@AhMiss;:::,,r#@H2;. .;rX
	iS#@#AX25X&@iiAHMMA92XA@AM@#@@G2i3GsX#,  ;9  rM@#MXS255h3SSSX&HAAB@A2@@S :rr;:;srr@#h9&2#A5ir;rri#@@@MG2Ssii
	9A@#A9523hA@:r9AAMMHAGhB#;32Xr:rs9M@X     ;BsrM@@MG9&M@@@@@#HG9B@#HM@& .;rr;:;ir.A@H&His@###A5i259#@@@@@@@hi
	##MAhXXhGA#@.:i25Si5XS3A@;:229&M#Bhr        r3#@@@@@#@@@@@@@#BM@@BM9.  ,2Sr;:s; A@@AhBr.@@@@@#BGXS9@@@@@MiSX
	#MAhXXG&H#@A :s;.,,;5i9B@9G@@@@@isi5r;:.       ,r552@@@@@@@@@@@@@h:     ..,rr,.#@@#A&Br ,iA@@@@#BG39&#@h:;i9
	MHHA&AM#@@@r iS::;;39XH#@@@MH#@@2;5GGSr:.          ;@@M@BA32399&H#@@@#i    :..@#G@#GA@&    s@@@@@@B933& .X9h
	MBHAHHBBBM@r;M2SXhA#AA@@#A92AB#@@:rXH&Sr;,     .  :Xh##h    .,;rr;iH@@@@M;, ,@@iH@#H@@#,.,, ,i2GA#@#BAG,r#@G
	#HAhh&G&H@@rA@hM###@@@@B9hAGGA#@@M:iXhh2s;,...,. ,S.B@@B: .,:r:.,,,rS&@@@@@@@@#&@@#@@#r,ssrr.,;rrr2B@@@#@#BH
	BAHAAHMM##93AHHBMB###MHAAA&&G&HM#@2;siiis;:.    .AAs2#@@#&5ii5;;rrriS3ABhrs23GAHMMMMAi;riiX92ssiSSSS2AHB###M
	-->

<!-- Favicon -->
<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo bloginfo('template_directory'); ?>/images/favicon.ico">

<!-- Stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/reset.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">

<!-- Pingback -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
 
<!-- Added by WP -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="header">
			<!-- Logo / Branding -->
			<h1 class="brand"><a href="<?php bloginfo( 'url' ) ?>"><?php bloginfo( 'name' ); ?>&trade;</a></h1>
			<!-- Primary Navigation -->
			<?php wp_nav_menu( array('container' =>'', 'theme_location' => 'primary-menu' ) ); ?>	
		</div> <!-- e: header -->
		<div id="main">
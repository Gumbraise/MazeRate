<?php
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_GET['id']));
    $user = $requser->fetch();

    $profilepicture = $user['picture'];

    $noteune = substr($user['points'], 0, 3);
    $notedeux = substr($user['points'], 3, 5);

    if(isset($_GET['id'])) {
        if($_GET['id'] != $_SESSION['id']) {
?>
<body>
    <div class="headerprofile">
        <div class="pictureprofile">
            <div class="cercleprofile" style="background-image: url('img/picture/<?php echo $profilepicture; ?>')"></div>
        </div>
        <div class="name">
            <p class="name"><?php echo $user['firstname']." ".$user['name']; ?></p>
        </div>
        <div class="note">
            <p><font class="noteu"><?php echo $noteune; ?></font><font class="noted"> <?php echo $notedeux; ?></font></p>
        </div>
        <div class="work">
            <?php if($user['work'] == 0) { ?>
                <p class="work">DOES NOT WORK CURRENTLY</p>
            <?php } else { ?>
                <p class="work">CURRENTLY WORKING AT <?php echo strtoupper($user['work']); ?></p>
            <?php } ?>
        </div>
        <div class="toolbar">
            <font id="activity" class="activity" style="font-weight: bold;"><a class="nada" onclick="activity();">ACTIVITY</a></font>
            <font id="moments" class="moments" style="font-style: italic;"><a class="nada" onclick="moments();">MOMENTS</a></font>
            <font id="photos" class="photos" style="font-style: italic;"><a class="nada" onclick="photos();">PHOTOS</a></font>
            <font id="rated" class="rated" style="font-style: italic;"><a class="nada" onclick="rated();">RATED</a></font>
            <font id="friends" class="friends" style="font-style: italic;"><a class="nada" onclick="friends();">FRIENDS</a></font>
        </div>
        <div class="trait"></div>
    </div>
    <div class="divright">
        <div class="search">
            <p class="search">Search</p>
            <input type="text" onChange="rechercheAjaxMembre();" id="recherche" placeholder="Rechercher un membre. (Appuyez sur 'Entrée' pour valider)" />
        </div>
    </div>
    <div class="activityun" style="visibility: visible;">
        <?php
            $requser = $bdd->prepare("SELECT * FROM activity WHERE id_user = ?");
            $requser->execute(array($_GET['id']));
            $user = $requser->fetch();
        ?>
    </div>
<?php
    } else {
?>
    <div class="headerprofile">
        <div class="pictureprofile">
            <div class="cercleprofile" style="background-image: url('img/picture/<?php echo $profilepicture; ?>')"></div>
        </div>
        <div class="name">
            <p class="name"><?php echo $user['firstname']." ".$user['name']; ?></p>
        </div>
        <div class="note">
            <p><font class="noteu"><?php echo $noteune; ?></font><font class="noted"> <?php echo $notedeux; ?></font></p>
        </div>
        <div class="work">
            <?php if($user['work'] == 0) { ?>
                <form method="post" action="changeWork"><input type="text" class="changeWork" name="changeWork" placeholder="DOES NOT WORK CURRENTLY"></form>
            <?php } else { ?>
                <p class="work">CURRENTLY WORKING AT <?php echo strtoupper($user['work']); ?></p>
            <?php } ?>
        </div>
        <div class="toolbar">
            <font id="activity" class="activity" style="font-weight: bold;"><a class="nada" onclick="activity();">ACTIVITY</a></font>
            <font id="moments" class="moments" style="font-style: italic;"><a class="nada" onclick="moments();">MOMENTS</a></font>
            <font id="photos" class="photos" style="font-style: italic;"><a class="nada" onclick="photos();">PHOTOS</a></font>
            <font id="rated" class="rated" style="font-style: italic;"><a class="nada" onclick="rated();">RATED</a></font>
            <font id="friends" class="friends" style="font-style: italic;"><a class="nada" onclick="friends();">FRIENDS</a></font>
        </div>
        <div class="trait"></div>
    </div>
    <div class="divright">
        <div class="search">
            <p class="search">Search</p>
            <input type="text" onChange="rechercheAjaxMembre(); document.forms[0].submit();" id="recherche" placeholder="Rechercher un membre. (Appuyez sur 'Entrée' pour valider)" />
        </div>
    </div>
    <div class="activityun" style="visibility: visible;">
        <?php
            $requser = $bdd->prepare("SELECT * FROM activity WHERE id_user = ?");
            $requser->execute(array($_GET['id']));
            $user = $requser->fetch();
        ?>
    </div>
<?php 
    }
} else {
    header("Location: index.php");
}
?>
</body>
<script type="text/javascript" src="js/main.js"></script>
<script>
	function rechercheAjaxMembre()
	{
		$.ajax({
			url: 'actions/membres.php',
			type: 'POST',
			data: 'ajax=true&recherche='+$('#recherche').val(),
			success: function(code, statut){
				$.document.write(code);
			}
		});
	}
</script>
</html>
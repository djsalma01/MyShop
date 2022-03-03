<script language="javascript" type="text/javascript">
function doReload(category){
	document.location = 'index.php?category=' + category;
	
	/* But if you want to submit the form just comment above line and uncomment following lines*/
	//document.frm1.action = 'samepage.php';
	//document.frm1.method = 'post';
	//document.frm1.submit();
}
</script>
<?php

/*-----function get products from data base-------*/

function display($query){
    if(require("connect_db.php")){
        $bdd=connectDB("salma", "salma");
        $sth = $bdd->prepare($query);
        $sth->execute();
        $data=$sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}
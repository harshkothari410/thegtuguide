<?php
session_start();
	
	$connect=mysql_connect("localhost","alphasci_user","!@#$%");
	mysql_select_db("alphasci_gtu",$connect);	
$searchbox=$_POST['searchbox'];
$search=explode(" ",$searchbox);
		unset($_SESSION['search']);
		$zz=0;
		$z=0;
		$_SESSION['bookcounter']=0;
		$_SESSION['search']=1;
		
		while(isset($search[$zz]))
		{
		$bookquery="SELECT * from books where Author LIKE '%$search[$z]%' or Title LIKE '%$search[$z]%'";
		$bookresult=mysql_query($bookquery,$connect);
		if($bookresult)
		{
			
			
		
		while($bookrow=mysql_fetch_assoc($bookresult))
		{
			$_SESSION['bookcounter']++;
			$titlearray[$z]=$bookrow['Title'];
			$authorarray[$z]=$bookrow['Author'];
			$link1array[$z]=$bookrow['boxlink1'];
			$link2array[$z]=$bookrow['mediafirelink2'];
			$z++;
		}
		if(sizeof($titlearray!=1))
		{
		
			$comma_separated = @implode(",", $titlearray);
			$_SESSION['titlearray']=$comma_separated;
		}
		else
		{
			
			$_SESSION['titlearray']=$titlearray[$z-1];
		}
		if(sizeof($authorarray!=1))
		{
		
			$comma_separated = @implode(",", $authorarray);
			$_SESSION['authorarray']=$comma_separated;
		}
		else
		{
			
			$_SESSION['authorarray']=$authorarray[$z-1];
		}
		if(sizeof($link1array!=1))
		{
		
			$comma_separated = @implode(",", $link1array);
			$_SESSION['link1array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link1array']=$link1array[$z-1];
		}
		if(sizeof($link2array!=1))
		{
		
			$comma_separated = @implode(",", $link2array);
			$_SESSION['link2array']=$comma_separated;
		}
		else
		{
			
			$_SESSION['link2array']=$link2array[$z-1];
		}
		}
		$zz++;
	}
		header('location: search.php');
		
?>
<?php

$page_title = "Search book";

include('includes/header.php');
?>
    <div class="searchpacks">
        <div class="searchpacksform">
            <div class="searchpackstxt">
                <h1>Search Packs by Title</h1>
                <form class="searchpacksform2" action="searchpacksresults.php" method="get">
                    <input class="searchpacksinput" type="text" name="terms" size="40" required/>&nbsp;&nbsp;
                    <input class="searchpackssubmit" type="submit" name="Submit" id="Submit" value="Search"/>
                </form>
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
<?php /*
 * Template Name: embeds
 Template Post Type: recordings
 */

/* other PHP code here */
session_start();
if (!$_SESSION['loggedin']) {
    header('Location: /account/login');
}

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3700) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    session_start();
    $_SESSION['loggedin'] = false;
    $_SESSION['idle'] = "You have been logged out, due to inactivity.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

get_header(); ?>

<div class="page-banner">
    <?php pageBanner(); ?>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">

</div> 
        <h5 class="heading1"> <?php if (isset($_SESSION['clientData']))
                echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; ?> </h5>
        <?php
        if (isset($_SESSION['message_1'])) {
            echo  $_SESSION['message_1'];
        } ?>
    </div>
    <div class="page-links">

        <h5 class="page-links__title active">Past Conference Resources<a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-light fa-angle-down fa-lg"></i>
            </a></h5>
        <div class="topnav" id="myTopnav">
            <ul class="nav flex-column">
                <?php if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <li><a class="nav-link" href="/keynote-speakers"> Keynote Speakers </a></li>
                    <li><a class="nav-link" href="/recordings"> Recorded Workshops </a></li>
                    <li><a class="nav-link" href="/handouts"> Presenter Handouts </a></li>
                    <li><a class="nav-link" href="/subgroups"> Facebook Subgroups </a></li>

                <?php }

                ?>
            </ul>



        </div>

    </div>

    <div id="column">
        <header class="btn">Keynote Speakers</header>
        <div class="embed">
            <header class="btn"> Calvin Stephens </header>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/3OOFTvqlPGM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="embed">
            <header class="btn"> Latter day Saint Widows & Widowers Story – “Miracles Among Us” </header>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/TYbnhvnld3Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="embed">
            <header class="btn"> Matt Townsend </header>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Gb33v7O4Z0o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>


    </div>
</div>
</div>
</main>


<footer id="page_footer">
    <?php get_footer(); ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script type="text/javascript" src=" /library/account.js"></script>

</body>

</html>

<?php unset($_SESSION['message_1']); ?>
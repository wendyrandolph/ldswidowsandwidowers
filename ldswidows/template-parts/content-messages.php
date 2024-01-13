 <p class="t-left"> <?php
                        if (isset($_SESSION['idle'])) {
                            echo $_SESSION['idle'];
                        }
                        if (isset($_SESSION['message_1'])) {
                            echo $_SESSION['message_1'];
                        }
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];
                        }
                        if (isset($_SESSION['emailMessage'])) {
                            echo $_SESSION['emailMessage'];
                        }
                        if (isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];
                        }
                        if (isset($_SESSION["resetMessage"])) {
                            echo $_SESSION["resetMessage"];
                        }
                       

?></p>

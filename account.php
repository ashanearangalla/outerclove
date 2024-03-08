<?php
session_start();
include("header-onlineorder.php");

?>

    <main class="account-main">

        <section class="account-view">

            <div class=account-container>
                <div class="account-card">
                    <div class="account-heading">
                        <p>
                            Account
                        </p>

                    </div>
                    <div class="account-info">

                        <div class="account-summary">
                            <div class="account-box">
                                <div class="account-heading-box">
                                    <p class="user-name">My Account</p>

                                </div>
                                <div class="account-icon-box">
                                    <i class="bi bi-person-circle"></i>


                                </div>
                                <div class="account-username-box">
                                    <p class="welcome">Welcome!</p>
                                    <p class="name">Ashane Lakshitha</p>
                                </div>

                                <div class="button-box">
                                    <a href="vieworder.php"><button class="viewbutton">
                                        View Orders
                                    </button></a>

                                    <a href="feedbackform.php"><button class="viewbutton">
                                        Give Feedback
                                    </button></a>

                                    <a href="admin/logout.php"><button class="viewbutton">
                                        Log Out
                                    </button></a>
                                </div>

                            </div>

                        </div>

                        <div class="account-form">
                            <form id="form1" name="form1" method="post" action="">

                                <div class="account-form-details">

                                    <div class="inputs">
                                        <div class="account-heading-box">
                                            <p class="form-heading">Profile</p>

                                        </div>
                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="firstName">First Name:</label><br>
                                                <input class="divided-input-checkout" value="<?php echo $_SESSION["user"]["user_fname"]; ?>" placeholder="First Name" type="text" name="firstName" id="firstName" />
                                            </div>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="lastName">Last Name:</label><br>
                                                <input class="divided-input-checkout" value="<?php echo $_SESSION["user"]["user_lname"]; ?>" placeholder="Last Name" type="text" id="lastName" />
                                            </div>

                                        </div>


                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="email">Email:</label><br>
                                                <input class="divided-input-checkout" type="text" value="<?php echo $_SESSION["user"]["user_email"]; ?>" placeholder="Email" name="email" id="email" />
                                            </div>

                                        </div>

                                        <div class="account-heading-box">
                                            <p class="form-heading-2">Change Password</p>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="currentpassword">Current Password:</label><br>
                                                <input class="divided-input-checkout" placeholder="Current Password" type="text" name="currentpassword" id="currentpassword" />
                                            </div>

                                        </div>

                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="newpassword">New Password:</label><br>
                                                <input class="divided-input-checkout" placeholder="New Password" type="text" id="newpassword" />
                                            </div>

                                        </div>


                                        <div class="divided">
                                            <div class="col1">
                                                <label class="labels" for="confirmpassword">Confirm Password:</label><br>
                                                <input class="divided-input-checkout" type="text" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" />
                                            </div>

                                        </div>
                                        <div class="save-button">
                                            <button class="savechanges">
                                                Save Changes
                                            </button>
                                        </div>


                                    </div>

                                </div>








                            </form>


                        </div>



                    </div>
                </div>



            </div>

        </section>
    </main>
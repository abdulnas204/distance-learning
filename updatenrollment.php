<!doctype html>
<html>
<head>
<meta charset="utf-8">

    <?php include_once("view/header.php");
        if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
           $theID = $_SESSION['userMatricNo'];
            $tablename = "users";
            echo $title = "<title> Update Enrollment: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")</title>";
            include_once("model/uploadParse.php");
        }
        else{
            $helper->redirect_to("account");
        }

    ?>
    
    <div id="mainContent">
        <div class="spacer" style="clear: both;"></div>
        <div class="topContent">

            <div class="aboutDescSide">
                <article>

                    <header>
                        <h4><strong><?php echo $load_data->getFirstname($theID, $tablename) ?></strong></h4><br/>
                    </header>

                    <content>
                        <div id="profile">
                            <?php echo $load_data->profileBtn()?>
                            <?php echo $load_data->changeProfileForm($theID) ?>
                            <?php echo $load_data->getProfilePic($theID) ?>
                        </div>
                        <p style="color: #ff0000;"> <?php if(isset($result)) echo $result; ?></p>

                        <div class="displayCourses green" style="width: 84%;"><a href="my_account" title="Update Login Details">Update Login Details</a></div><br/>
                        <div class="displayCourses blue" style="width: 84%;"><a class="loaduser" id="statclose" title="Site Statistics" onclick="toggleElements('stat', 'stats')">View Site Statistics</a></div>

                        <div id="stat">
                        <table width="97%" border="0" cellpadding="1" style="overflow: hidden;">
                        <tr>
                            <td>
                                <label>Registered On:</label>
                            <?php echo $load_data->getDateRegistered($theID, $tablename) ?>
                        </tr>
                        <tr>
                        <td >
                            <label>Last Login Date:</label>
                           <?php echo $load_data->getLastLoginDate($theID, $tablename) ?>
                        </td>
                        </tr>
                        <tr>
                            <td >
                                <label>Registered from IP:</label>
                                <?php echo $load_data->getRegistrationIP($theID, $tablename) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label >Last Logged IP:</label>
                                <?php echo $load_data->getLastLoginIP($theID, $tablename) ?>
                            </td>
                        </tr>
                        </table>
                            </div>


                    </content>

                </article>
            </div>

        <div class="aboutDesc">
        	<article>
            
            <header>
             <h4><strong> "Update Enrollment Details"</strong></h4>
            </header>

        <content><br/>
            <div id="success">
                <img src="images/check.png" width="70" height="70">
            </div>

            <div class="featured"> </div>

            <form action="" method="post" class="enrollform">
                <div id="personalInfo">
                    <fieldset id="bio_data">
                        <legend><strong>Bio Data</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Passport / IC No.:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Passport No.:</label>
                                    <input type="text" name="txtIC" id="txtIC" disabled="disabled" style="border: 0;"
                                           size="50" value="<?php echo $load_data->getIC($theID, $tablename) ?>"></td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Firstname:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Firstname:</label>
                                    <input type="text" name="txtFirstname"
                                           value="<?php echo $load_data->getFirstname($theID, $tablename) ?>"
                                           id="txtFirstname"
                                           size="50"></td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Other Names:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Other Names:</label>
                                    <input type="text" name="txtOtherNames"
                                           value="<?php echo $load_data->getLastname($theID, $tablename) ?>"
                                           id="txtOtherNames" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Nationality:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Nationality:</label>
                                    <input type="text" name="txtNationailty"
                                           value="<?php echo $load_data->getNationality($theID, $tablename) ?>"
                                           id="txtNationailty" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Gender:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Gender:</label>
                                    <select name="txtGender" id="txtGender">
                                        <option value="<?php echo $load_data->getGender($theID, $tablename) ?>">
                                            <?php echo $load_data->getGender($theID, $tablename) ?> </option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>

                    <fieldset>
                        <legend><strong>Programme Information</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Last Year In School:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Last Year In School:</label>
                                    <input type="text" name="txtLastyear" id="txtLastyear" size="50"
                                           value="<?php echo $load_data->getLastSchoolYear($theID) ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Intake:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Intake:</label>
                                    <input type="text" name="txtIntake"
                                           id="txtIntake" readonly value="<?php echo $load_data->getIntake($theID) ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Department:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Department:</label>
                                    <select name="txtDepartment" id="txtDepartment">
                                        <option value="<?php echo $load_data->getDepartment($theID, $tablename) ?>">
                                            <?php echo $load_data->getDepartment($theID, $tablename) ?> </option>
                                        <?php echo $helper->getDepartment();?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Programme:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Programme:</label>
                                    <select name="txtCourse" id="txtCourse">
                                        <option value="<?php echo $load_data->getCourse($theID, $tablename) ?>">
                                            <?php echo $load_data->getCourse($theID, $tablename) ?> </option>
                                        <?php echo $helper->getProgramme();?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Status:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Status:</label>
                                    <select name="txtStatus" id="txtStatus">
                                        <option value="<?php echo $load_data->getStatus($theID, $tablename) ?>">
                                            <?php echo $load_data->getStatus($theID, $tablename) ?> </option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </fieldset>

                    <fieldset>
                        <legend><strong>Contact Information</strong></legend>
                        <table width="100%" border="0" cellpadding="1">

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Email Address:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Email Address:</label>
                                    <input type="text" readonly name="txtEmail" id="txtEmail"
                                           value="<?php echo $load_data->getEmail($theID, $tablename) ?>"
                                           size="50"></td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Phone Number:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Phone Number:</label>
                                    <input type="text" name="txtPhone" id="txtPhone"
                                           value="<?php echo $load_data->getPhone($theID, $tablename) ?>"
                                           maxlength="16">
                                </td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Permanent Address:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Permanent Address</label>
                                    <textarea name="txtAddress" id="txtAddress"><?php echo trim($load_data->getAddress($theID, $tablename))?></textarea>
                                </td>
                            </tr>
                        </table>
                    </fieldset>

                    <fieldset>
                        <legend><strong>Next of Kin</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Fullname:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Fullname:</label>
                                    <input type="text" name="txtFullname" id="txtFullname"
                                           value="<?php echo $load_data->getNextKinName($theID) ?>"
                                           size="50">
                                </td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Occupation:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Occupation:</label>
                                    <input type="text" name="txtOccupation"
                                           value="<?php echo $load_data->getNextKinOccupation($theID) ?>"
                                           id="txtOccupation"
                                           size="50"></td>
                            </tr>
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Contact Number:</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Contact Number:</label>
                                    <input type="text" name="txtNextofkinphone"
                                           value="<?php echo $load_data->getNextKinPhone($theID) ?>"
                                           id="txtNextofkinphone" maxlength="16">
                                </td>
                            </tr>
                        </table>

                        <p><input id="p_info" type="button" name="parseStudentUpdate"
                                  style="float:right;" onclick="updateStudent()"
                                  class="btn" value="Update Record"> </p>
                    </fieldset></div>
            </form>
                </content>
            </article>
        <p style="width:97%;"><a href="<?php if(isset($back)) echo $back; ?>" class="readMore orange" title="Back to previous Page">Back to previous Page</a></p>
        </div>
        </div>

        <div class="spacer" style="clear: both;"></div>
        <div id="fade"></div>
        <div id="modal">
            <img id="loader" src="images/loading.gif" />
        </div>
			<div class="mainFooter">
        <div class="topContent"> <?php include_once('view/footer.php'); ?> </div>
        <div class="spacer" style="clear: both;"></div>

        </div><!--Top Content end here-->     
    </div>

</div>
</body>

</html>
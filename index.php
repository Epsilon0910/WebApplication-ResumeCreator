<?php
    include('connection.php');
 ?>

<!doctype html>
<html lang="en-US">

<head>
    <title>Create Resume</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LOGO</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#home">Home</a></li>
                    <li><a href="#projectsection">Projects</a></li>
                    <li><a href="signin/index.php">Log In</a></li>
                    <li><a href="signup/index.php">Sign up</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="border row">
            <div class="section-1 colm-2"></div>
            <div class="section-2 colm-2"></div>
            <div class="section-3 colm-2"></div>
            <div class="section-4 colm-2"></div>
            <div class="section-5 colm-2"></div>
            <div class="section-6 colm-2"></div>
        </div>
        <div class="mainbar">
            <div class="details personal-detail row">
                <div class="left-element col-sm-11">
                    <ul>
                        <li>
                            <h2><b>Charchit Joshi</b></h2>
                        </li>
                        <li>
                            charchit.jd@gmail.com
                        </li>
                        <li>
                            +91 7354228930
                        </li>
                        <li>
                            Bhopal, Madhya Pradesh, India
                        </li>
                    </ul>
                </div>
                <div class="detail-right-element pull-right col-sm-1">
                    <a class="edit">edit</a>
                </div>
            </div>

            <div class="details row resume-education">
                <div class="details-left-cell col-sm-3">
                    <h4>EDUCATION</h4>
                </div>
                <div class="details-right-cell col-sm-9 prefilled-education-details">
                    <div class="education-container" id="education-container">
                        
                    </div>

                    <div class="addMoreItemContainer" id="education-resume">
                        <button class="btn btn-basic" data-keyboard="true" data-toggle="modal" data-target="#education-modal">
                            + Add New Education
                        </button>
                    </div>
                </div>
                <!--education-modal-1-->
                <div class="modal fade" id="education-modal" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Education</h4>
                            </div>
                            <div class="modal-body">
                                <div class="well well-sm" data-keyboard="true" data-toggle="modal" data-target="#education-graduation-modal" data-dismiss="modal">
                                    Graduation
                                </div>
                                <div class="well well-sm">
                                    XII (Senior Secondary)
                                </div>
                                <div class="well well-sm">
                                    X (Secondary)
                                </div>
                                <div class="well well-sm">
                                    Post Graduation
                                </div>
                                <div class="well well-sm">
                                    Diploma
                                </div>
                                <div class="well well-sm">
                                    PhD
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var i;
                obj = { "table":"demo3"};
                dbParam = JSON.stringify(obj);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        var noOfArray = Object.keys(myObj).length;

                        for(i = 0; i<noOfArray; i++){
                            var text1 = myObj[i].degree+", "+myObj[i].stream+" ("+myObj[i].start_year+"-"+myObj[i].end_year+") ";
                            var text2 = myObj[i].college;
                            var text3 = myObj[i].performance_scale+" : "+myObj[i].performance+"/10";

                            var h3par = document.createElement("h3");
                            var h3node = document.createTextNode(text1);
                            h3par.appendChild(h3node);

                            var div22 = document.createElement("div");
                            var div22node = document.createTextNode(text2);
                            div22.appendChild(div22node);

                            var div23 = document.createElement("div");
                            var div23node = document.createTextNode(text3);
                            div23.appendChild(div23node);

                            var div = document.createElement("div");
                            div.className = "div2";
                            div.appendChild(h3par);
                            div.appendChild(div22);
                            div.appendChild(div23);

                            var element = document.getElementById("education-container");
                            element.appendChild(div);
                        }
                    }
                };
                xmlhttp.open("GET", "getdata.php?x=" + dbParam, true);
                xmlhttp.send();
            </script>

            <!--education-graduation-modal-->
            <div class="modal fade" id="education-graduation-modal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Education</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="submitform.php">
                                <div class="form-group">
                                    <label>College*:</label>
                                    <input class="form-control" id="college-name" name="college" type="text" placeholder="Ex: UIT RGPV" required="required" />
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label>Start Year*:</label>
                                        <select class="form-control" id="start-year" name="start_year" required>
                                            <option >Choose Year</option>
                                            <option >2014</option>
                                            <option >2015</option>
                                            <option >2016</option>
                                            <option >2017</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>End Year*:</label>
                                        <select class="form-control" id="end-year" name="end_year" required>
                                            <option >Choose Year</option>
                                            <option >2014</option>
                                            <option >2015</option>
                                            <option >2016</option>
                                            <option >2017</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Degree*:</label>
                                    <input class="form-control" id="degree" name="degree" type="text" placeholder="Ex: B.Tech" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Stream:</label>
                                    <select class="form-control" name="stream" id="stream">
                                        <option>Select Your Stream</option>
                                        <option <?php if ($branch == CS ) echo 'selected' ; ?> >CS</option>
                                        <option <?php if ($branch == IT ) echo 'selected' ; ?> >IT</option>
                                        <option <?php if ($branch == EC ) echo 'selected' ; ?> >EC</option>
                                        <option <?php if ($branch == ME ) echo 'selected' ; ?> >ME</option>
                                        <option <?php if ($branch == CE ) echo 'selected' ; ?> >CE</option>
                                        <option <?php if ($branch == EX ) echo 'selected' ; ?> >EX</option>
                                        <option <?php if ($branch == AU ) echo 'selected' ; ?> >AU</option>
                                        <option <?php if ($branch == PC ) echo 'selected' ; ?> >PC</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Performance Scale:</label>
                                        <select class="form-control" id="performance-scale" name="performance_scale">
                                            <option>Select Option</option>
                                            <option>Percentage</option>
                                            <option>CGPA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Performance:</label>
                                        <input class="form-control" id="performance" name="performance" type="number" placeholder="0.00" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default pull-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--success-modal-->
            <div class="modal fade" id="success-moda" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
                            <strong>Success!</strong> Your information is successfully added.
                        </div>
                    </div>
                </div>
            </div>

            <script>


            </script>

            <div class="details row resume-project ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>PROJECTS</h4>
                </div>
                <div class="details-right-cell col-sm-9 prefilled-projects-details ">
                    <div class="project-container ">
                    </div>
                    <div class="addMoreItemContainer " id="project-resume ">
                        <button class="btn btn-basic " data-keyboard="true " data-toggle="modal " data-target="#project-modal ">
                            + Add New Project
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="project-modal " role="dialog " tabindex="-1 ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Project</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal " data-target="#success-modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-job ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>JOBS</h4>
                </div>
                <div class="details-right-cell col-sm-9 ">
                    <div class="job-container ">
                    </div>
                    <div class="addMoreItemContainer " id="job ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#job-modal ">
                            + Add New Job
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="job-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Job</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-internship ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>INTERNSHIPS</h4>
                </div>
                <div class="details-right-cell col-sm-9 ">
                    <div class="internship-container ">
                    </div>
                    <div class="addMoreItemContainer " id="internship ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#internship-modal ">
                            + Add New Internship
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="internship-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Internship</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-position-of-responsibility ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>POSITIONS OF RESPONSIBILITY</h4>
                </div>
                <div class="details-right-cell col-sm-9 prefilled-position-of-responsibility-details ">
                    <div class="position-of-responsibility-container ">
                    </div>
                    <div class="addMoreItemContainer " id="por-resume ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#position-of-responsibility-modal ">
                            + Add New Position Of Responsibility
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="position-of-responsibility-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add Education</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-training ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>TRAININGS</h4>
                </div>
                <div class="details-right-cell col-sm-9 prefilled-trainings-details ">
                    <div class="training-container ">
                    </div>

                    <div class="addMoreItemContainer " id="training-resume ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#training-modal ">
                            + Add New Training
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="training-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Training</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-project ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>PROJECTS</h4>
                </div>
                <div class="details-right-cell col-sm-9 prefilled-projects-details ">
                    <div class="project-container ">
                    </div>
                    <div class="addMoreItemContainer " id="project-resume ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#project-modal ">
                            + Add New Project
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="project-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Project</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-skill ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>SKILLS</h4>
                </div>
                <div class="details-right-cell col-sm-9 ">
                    <div class="skills-container prefilled-skills-details ">
                    </div>
                    <div class="addMoreItemContainer " id="skill-form-modal ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#skill-modal ">
                            + Add New Skill
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="skill-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Skill</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details row resume-work-sample ">
                <div class="details-left-cell col-sm-3 ">
                    <h4>WORK SAMPLES</h4>
                </div>
                <div class="details-right-cell col-sm-9 ">
                    <div class="work-sample-container ">
                    </div>
                    <div class="addMoreItemContainer " id="work-modal ">
                        <button class="btn btn-basic " data-toggle="modal " data-target="#work-sample-modal ">
                            + Add New Work Sample
                        </button>
                    </div>
                </div>
                <!--modal-->
                <div class="modal fade " id="work-sample-modal " role="dialog ">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button " class="close " data-dismiss="modal ">&times;</button>
                                <h4 class="modal-title ">Add New Work Sample</h4>
                            </div>
                            <div class="modal-body ">

                            </div>
                            <div class="modal-footer ">
                                <button type="button " class="btn btn-default " data-dismiss="modal ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

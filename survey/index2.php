<!doctype html>
<html lang="en">

<head>
    <title>Survey Kepuasan Masyarakat Calll Center 112 Sumenep</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootrap for the demo page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style type="text/css">
    @media screen and (max-width: 1000px) {
        .mobile-space {
            margin-top: 50px;
        }

        .mobile-space_1 {
            margin-top: 50px;
        }

        .logo {
            height: 40px;
        }

        .gbr {
            width: 50%;
            height: 50%;
        }

        .chart {
            width: 100%;
            min-height: 300px;
        }
    }

    @media screen and (max-width: 600px) {
        .mobile-space {
            margin-top: 30px;
        }

        .mobile-space_1 {
            margin-top: 0px;
        }

        .logo {
            height: 30px;
        }

        .gbr {
            width: 100%;
        }
    }

    @media screen and (max-width: 1000px) {
        .mapid {
            height: 300px;
            width: 100%;
        }
    }

    @media screen and (min-width: 1200px) {
        .mapid {
            height: 600px;
            width: 100%;
        }
    }

    @media screen and (min-width: 1200px) {
        .mobile-space {
            margin-top: 190px;
        }

        .logo {
            height: 100px;
        }

        .gbr {
            height: 200px;
        }

        .chart {
            width: 100%;
            min-height: 500px;
        }
    }
    </style>
</head>

<body>

    <div class="container">

        <div class="mb-5 border-bottom">
            <center><img src="http://112.sumenepkab.go.id/img/cc112_ok.jpg" class="img-fluid">
                <br />
                <h1 class="">Survey Kepuasan Masyarakat Call Center 112 Kabupaten Sumenep</h1>
                <div class="mb-2 text-muted"></div>
                <br />
            </center>
            <!-- SmartWizard html -->
            <div id="smartwizard">
                <ul class="nav nav-progress">
                    <li class="nav-item">
                        <a class="nav-link" href="#step-1">
                            <div class="num">1</div>
                            Personal Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-2">
                            <span class="num">2</span>
                            Isi Survey
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-3">
                            <span class="num">3</span>
                            Selesai
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                        ON
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        ON
                    </div>
                    <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                        ON
                    </div>

                </div>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>



            <br /> &nbsp;
        </div>

        <!-- Bootrap for the demo page -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Include SmartWizard JavaScript source -->
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js"
            type="text/javascript"></script>


        <script type="text/javascript">
        function onCancel() {
            $('#smartwizard').smartWizard("reset");
        }

        function provideContent(idx, stepDirection, stepPosition, selStep, callback) {

            // Only get ajax content on the forward movement
            if (stepDirection == 'forward' && stepPosition == 'middle') {
                let repo = selStep.data('repo');
                // let repo = "jquery-smartwizard";
                let ajaxURL = "https://api.npms.io/v2/search?q=" + repo;
                // Ajax call to fetch your content
                $.ajax({
                    method: "GET",
                    url: ajaxURL,
                    beforeSend: function(xhr) {
                        // Show the loader
                        $('#smartwizard').smartWizard("loader", "show");
                    }
                }).done(function(res) {
                    let data = res.results[0];
                    console.log(data);

                    let keywordsHtml = '';
                    data.package.keywords.forEach(keyword => keywordsHtml +=
                        `<span class="badge bg-secondary me-1">${keyword}</span>`);

                    let popularity = parseInt(data.score.detail.popularity * 100);
                    let quality = parseInt(data.score.detail.quality * 100);
                    let maintenance = parseInt(data.score.detail.maintenance * 100);




                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");
                }).fail(function(err) {
                    // Reject the Promise with error message to show as tab content
                    callback("An error loading the resource");

                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");
                });
            }

            callback();
        }

        $(function() {
            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'square', // basic, arrows, square, round, dots
                transition: {
                    animation: 'fade' // none|fade|slideHorizontal|slideVertical|slideSwing|css
                },
                toolbar: {
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    position: 'bottom', // none/ top/ both / bottom
                    extraHtml: `<button class="btn btn-secondary" onclick="onCancel()">Cancel</button>`
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Highlight step with errors
                hiddenSteps: [], // Hidden steps
                getContent: provideContent
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !
                    $('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !
                    $('#is_reset').prop("checked"));
                return true;
            });

        });
        </script>
</body>

</html>
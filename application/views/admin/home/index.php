                    <div>
                        <div class="row tile_count">

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                                <div class="count">2500</div>
                                <span class="count_bottom"><i class="green">
                                <i class="fa fa-sort-asc"></i>
                                    4%
                                </i> From last Week</span>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-picture-o"></i> Total Photos</span>
                                <div class="count">3740</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 15% </i> From last Week</span>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-book"></i> Total Albums</span>
                                <div class="count">874</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 23% </i> From last Week</span>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-angellist"></i> New Member</span>
                                <div class="count">175</div>
                                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i> 34% </i> From last Week</span>
                            </div>
                        </div>
                        <!-- create chart-->
                        <div class="chart" style="margin-bottom: 100px">
                        <canvas class = "chartcanvas" id="canvas" height="250" width="800" ></canvas>
                        <script>
                        var datavalue = new Array(12,564,23,543,64,23,234);
                                        //config User
                                        var configUser = {
                                            type: 'line',
                                            data: {
                                                labels: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                                                datasets: [
                                                {
                                                    data: datavalue,
                                                    fill: true,

                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                title:{
                                                    display:true,

                                                },
                                                tooltips: {
                                                    mode: 'label',

                                                },
                                                hover: {
                                                    mode: 'dataset'
                                                },
                                                scales: {
                                                    xAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Month'
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Value'
                                                        },
                                                        ticks: {
                                                            suggestedMin: -10,
                                                            suggestedMax: 250,
                                                        }
                                                    }]
                                                }
                                            }
                                        };


                                        //config Photo
                                        var configPhotos = {
                                            type: 'line',
                                            data: {
                                                labels: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                                                datasets: [
                                                {
                                                    label: "Số photo Upload: ",
                                                    data: [15,42,59,100,63,25,41],
                                                    fill: true,

                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                title:{
                                                    display:true,

                                                },
                                                tooltips: {
                                                    mode: 'label',

                                                },
                                                hover: {
                                                    mode: 'dataset'
                                                },
                                                scales: {
                                                    xAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Month'
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Value'
                                                        },
                                                        ticks: {
                                                            suggestedMin: -10,
                                                            suggestedMax: 250,
                                                        }
                                                    }]
                                                }
                                            }
                                        };

                                        //config Album
                                        var configAlbums = {
                                            type: 'line',
                                            data: {
                                                 labels: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                                                datasets: [
                                                {
                                                    label: "Số Album được tạo: ",
                                                    data: [25,145,84,125,25,32,15],
                                                    fill: true,

                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                title:{
                                                    display:true,

                                                },
                                                tooltips: {
                                                    mode: 'label',

                                                },
                                                hover: {
                                                    mode: 'dataset'
                                                },
                                                scales: {
                                                    xAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Month'
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Value'
                                                        },
                                                        ticks: {
                                                            suggestedMin: -10,
                                                            suggestedMax: 250,
                                                        }
                                                    }]
                                                }
                                            }
                                        };
                                         //config Newmember
                                        var configNewmember = {
                                            type: 'line',
                                            data: {
                                                 labels: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                                                datasets: [
                                                {
                                                    data: [12,542,635,24,25,332,253],
                                                    fill: true,

                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                title:{
                                                    display:true,

                                                },
                                                tooltips: {
                                                    mode: 'label',

                                                },
                                                hover: {
                                                    mode: 'dataset'
                                                },
                                                scales: {
                                                    xAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Month'
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        display: true,
                                                        scaleLabel: {
                                                            show: true,
                                                            labelString: 'Value'
                                                        },
                                                        ticks: {
                                                            suggestedMin: -10,
                                                            suggestedMax: 250,
                                                        }
                                                    }]
                                                }
                                            }
                                        };


                                            dataset.borderColor = rgba(38, 185, 154, 0.7);
                                            dataset.backgroundColor = rgba(38, 185, 154, 0.31);
                                            dataset.pointBorderColor = rgba(38, 185, 154, 0.7);
                                            dataset.pointBackgroundColor = rgba(38, 185, 154, 0.7);
                                            dataset.pointBorderWidth = 1;

                        </script>
                        </div>
                        <div class="chartuser">
                            <script>
                                var ctx = document.getElementById("canvas").getContext("2d");
                                window.myLine = new Chart(ctx, configUser);
                        </script>
                        </div>



                     </div>
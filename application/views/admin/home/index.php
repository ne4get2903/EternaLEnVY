                    <div>
                        <div class="row tile_count">

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                                <div class="count"><?php echo $user_count['total'] ?></div>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-picture-o"></i> Total Photos</span>
                                <div class="count"><?php echo $photo_count['total'] ?></div>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-book"></i> Total Albums</span>
                                <div class="count"><?php echo $album_count['total'] ?></div>
                            </div>

                            <div class="col-md-3 tile_stats_count">
                                <span class="count_top"><i class="fa fa-angellist"></i> New Member</span>
                                <div class="count"><?php echo $new_user_count['total'] ?></div>
                            </div>
                        </div>
                        <!-- create chart-->
                        <div class="chart" style="margin-bottom: 100px">
                        <canvas class = "chartcanvas" id="canvas" height="250" width="800" ></canvas>
                        <script>
                        
                                        //config User
                                        var configUser = {
                                            type: 'line',
                                            data: {
                                                labels: ["<?php echo $dateweek['6']?>","<?php echo $dateweek['5']?>","<?php echo $dateweek['4']?>","<?php echo $dateweek['3']?>","<?php echo $dateweek['2']?>","<?php echo $dateweek['1']?>","<?php echo $dateweek['0']?>"],
                                                datasets: [
                                                {
                                                    label: "Tổng số user : ",
                                                    data: Array(<?php echo $user_count['count_by_date']['6']?>,<?php echo $user_count['count_by_date']['5']?>,<?php echo $user_count['count_by_date']['4']?>,<?php echo $user_count['count_by_date']['3']?>,<?php echo $user_count['count_by_date']['2']?>,<?php echo $user_count['count_by_date']['1']?>,<?php echo $user_count['count_by_date']['0']?>),
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
                                                labels: ["<?php echo $dateweek['6']?>","<?php echo $dateweek['5']?>","<?php echo $dateweek['4']?>","<?php echo $dateweek['3']?>","<?php echo $dateweek['2']?>","<?php echo $dateweek['1']?>","<?php echo $dateweek['0']?>"],
                                                datasets: [
                                                {
                                                    label: "Số photo Upload: ",
                                                    data: Array(<?php echo $photo_count['count_by_date']['6']?>,<?php echo $photo_count['count_by_date']['5']?>,<?php echo $photo_count['count_by_date']['4']?>,<?php echo $photo_count['count_by_date']['3']?>,<?php echo $photo_count['count_by_date']['2']?>,<?php echo $photo_count['count_by_date']['1']?>,<?php echo $photo_count['count_by_date']['0']?>),
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
                                                 labels: ["<?php echo $dateweek['6']?>","<?php echo $dateweek['5']?>","<?php echo $dateweek['4']?>","<?php echo $dateweek['3']?>","<?php echo $dateweek['2']?>","<?php echo $dateweek['1']?>","<?php echo $dateweek['0']?>"],
                                                datasets: [
                                                {
                                                    label: "Số Album được tạo: ",
                                                    data: Array(<?php echo $album_count['count_by_date']['6']?>,<?php echo $album_count['count_by_date']['5']?>,<?php echo $album_count['count_by_date']['4']?>,<?php echo $album_count['count_by_date']['3']?>,<?php echo $album_count['count_by_date']['2']?>,<?php echo $album_count['count_by_date']['1']?>,<?php echo $album_count['count_by_date']['0']?>),
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
                                                 labels: ["<?php echo $dateweek['6']?>","<?php echo $dateweek['5']?>","<?php echo $dateweek['4']?>","<?php echo $dateweek['3']?>","<?php echo $dateweek['2']?>","<?php echo $dateweek['1']?>","<?php echo $dateweek['0']?>"],
                                                datasets: [
                                                {
                                                    label: "Số thành viên mới :",
                                                    data: Array(<?php echo $new_user_count['count_by_date']['6']?>,<?php echo $new_user_count['count_by_date']['5']?>,<?php echo $new_user_count['count_by_date']['4']?>,<?php echo $new_user_count['count_by_date']['3']?>,<?php echo $new_user_count['count_by_date']['2']?>,<?php echo $new_user_count['count_by_date']['1']?>,<?php echo $new_user_count['count_by_date']['0']?>),
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
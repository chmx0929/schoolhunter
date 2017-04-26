<!DOCTYPE HTML>
<html>
    <style>
        .states {
                  fill: none;
                  stroke: #fff;
                  stroke-linejoin: round;
                }
        .states-choropleth {
                  fill: #ccc;
                }
        #tooltip-container {
                  position: absolute;
                  background-color: #fff;
                  color: #000;
                  padding: 10px;
                  border: 1px solid;
                  display: none;
                }
        .tooltip_key {
                  font-weight: bold;
                }
        .tooltip_value {
                  margin-left: 10px;
                  float: right;
                }
 
    </style>

	<head>
		<title>School Hunter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style type="text/css">select{width:170px;} div{ float:left} </style>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>SchoolHunter</h1>
								<p><!--[-->A web page for students searching dream school <!--]--><br />
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#Schools">Schools</a></li>
								<li><a href="#Search">Search</a></li>
								<li><a href="#Recommend">Recommend</a></li>
								<li><a href="#User">Wishlist</a></li>
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="Schools">
								

								<h2 class="major">Schools</h2>
								<?php $rank = mysql_connect("","schoolhunter_admin","admin123");
						            if (!$rank){
							            die('Could not connect: ' . mysql_error());
						               }
						            $db_selected = mysql_select_db('schoolhunter_DataBase', $rank);
						            if (!$db_selected) {
							            die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
						            }
						            $query = "SELECT * FROM University ORDER BY rank";
						            $result = mysql_query($query,$rank);
						            mysql_close($rank);
						        ?>
								
								<table style = 'width:100%'>
								 <tr>
								 <th>Rank</th>
    								 <th>University</th>
    								 <th>Tuition</th> 
    								 <th>location</th>
 								  </tr>
 								  
								
									<?php while($row  = mysql_fetch_array($result)):; ?>
									<tr>
										<td><?=$row['rank'];?></td>
										<td><a href = "<?=$row['link'];?> "><?=$row['uname'];?></a></td>
										<td><?=$row['tuition'];?></td>
										<td><?=$row['state'];?></td>
									<tr>
									<?php endwhile; ?>
								
								</table>
								
			                    
							    <div id="tooltip-container"></div>
							    
                                <div id="canvas-svg" style = 'width : 100%'></div>
                                
                                
							</article>

						<!-- Work -->
							<article id="Search">
								<?php include'search.php';?>
							</article>

						<!-- About -->
							<article id="Recommend">
								<?php include'recommend.php';?>
							</article>

						<!-- User -->
						<article id="User">
								<?php include'user.php';?>
							</article>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Hao Wang (haow4), Wang Xi (wangxi2), Zixian Song (zsong11), Xu Yang (xuy2)<a href="https://wiki.illinois.edu/wiki/display/cs411sp17/UFOUR">Wiki Link</a>.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	    <!-- Map Utilization @author:wangxi-->
	        <script src="https://d3js.org/d3.v3.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/1.1.0/topojson.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script>
                var my_var = <?php echo 35;?>
                console.log(may_var)
                d3.csv("population.csv", function(err, data) {
                  var config = {"color1":"#d3e5ff","color2":"#08306B","stateDataColumn":"state_or_territory","valueDataColumn":"population_estimate_for_july_1_2013_number"}
                  
                  var WIDTH = 800, HEIGHT = 500;
                  
                  var COLOR_COUNTS = 9;
                  
                  var SCALE = 0.7;
                  
                  function Interpolate(start, end, steps, count) {
                      var s = start,
                          e = end,
                          final = s + (((e - s) / steps) * count);
                      return Math.floor(final);
                  }
                  
                  function Color(_r, _g, _b) {
                      var r, g, b;
                      var setColors = function(_r, _g, _b) {
                          r = _r;
                          g = _g;
                          b = _b;
                      };
                  
                      setColors(_r, _g, _b);
                      this.getColors = function() {
                          var colors = {
                              r: r,
                              g: g,
                              b: b
                          };
                          return colors;
                      };
                  }
                  
                  function hexToRgb(hex) {
                      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                      return result ? {
                          r: parseInt(result[1], 16),
                          g: parseInt(result[2], 16),
                          b: parseInt(result[3], 16)
                      } : null;
                  }
                  
                  function valueFormat(d) {
                    if (d > 1000000000) {
                      return Math.round(d / 1000000000 * 10) / 10 + "B";
                    } else if (d > 1000000) {
                      return Math.round(d / 1000000 * 10) / 10 + "M";
                    } else if (d > 1000) {
                      return Math.round(d / 1000 * 10) / 10 + "K";
                    } else {
                      return d;
                    }
                  }
                  
                  var COLOR_FIRST = config.color1, COLOR_LAST = config.color2;
                  
                  var rgb = hexToRgb(COLOR_FIRST);
                  
                  var COLOR_START = new Color(rgb.r, rgb.g, rgb.b);
                  
                  rgb = hexToRgb(COLOR_LAST);
                  var COLOR_END = new Color(rgb.r, rgb.g, rgb.b);
                  
                  var MAP_STATE = config.stateDataColumn;
                  var MAP_VALUE = config.valueDataColumn;
                  
                  var width = WIDTH,
                      height = HEIGHT;
                  
                  var valueById = d3.map();
                  
                  var startColors = COLOR_START.getColors(),
                      endColors = COLOR_END.getColors();
                  
                  var colors = [];
                  
                  for (var i = 0; i < COLOR_COUNTS; i++) {
                    var r = Interpolate(startColors.r, endColors.r, COLOR_COUNTS, i);
                    var g = Interpolate(startColors.g, endColors.g, COLOR_COUNTS, i);
                    var b = Interpolate(startColors.b, endColors.b, COLOR_COUNTS, i);
                    colors.push(new Color(r, g, b));
                  }
                  
                  var quantize = d3.scale.quantize()
                      .domain([0, 1.0])
                      .range(d3.range(COLOR_COUNTS).map(function(i) { return i }));
                  
                  var path = d3.geo.path();
                  
                  var svg = d3.select("#canvas-svg").append("svg")
                      .attr("width", width)
                      .attr("height", height);
                  
                  d3.tsv("https://s3-us-west-2.amazonaws.com/vida-public/geo/us-state-names.tsv", function(error, names) {
                  
                  name_id_map = {};
                  id_name_map = {};
                  
                  for (var i = 0; i < names.length; i++) {
                    name_id_map[names[i].name] = names[i].id;
                    id_name_map[names[i].id] = names[i].name;
                  }
                  
                  data.forEach(function(d) {
                    var id = name_id_map[d[MAP_STATE]];
                    valueById.set(id, +d[MAP_VALUE]); 
                  });
                  
                  quantize.domain([d3.min(data, function(d){ return +d[MAP_VALUE] }),
                    d3.max(data, function(d){ return +d[MAP_VALUE] })]);
                  
                  d3.json("https://s3-us-west-2.amazonaws.com/vida-public/geo/us.json", function(error, us) {
                    svg.append("g")
                        .attr("class", "states-choropleth")
                      .selectAll("path")
                        .data(topojson.feature(us, us.objects.states).features)
                      .enter().append("path")
                        .attr("transform", "scale(" + SCALE + ")")
                        .style("fill", function(d) {
                          if (valueById.get(d.id)) {
                            var i = quantize(valueById.get(d.id));
                            var color = colors[i].getColors();
                            return "rgb(" + color.r + "," + color.g +
                                "," + color.b + ")";
                          } else {
                            return "";
                          }
                        })
                        .attr("d", path)
                        .on("mousemove", function(d) {
                            var html = "";
                  
                            html += "<div class=\"tooltip_kv\">";
                            html += "<span class=\"tooltip_key\">";
                            html += id_name_map[d.id];
                            html += "</span>";
                            html += "<span class=\"tooltip_value\">";
                            html += (valueById.get(d.id) ? valueFormat(valueById.get(d.id)) : "");
                            html += "";
                            html += "</span>";
                            html += "</div>";
                            
                            $("#tooltip-container").html(html);
                            $(this).attr("fill-opacity", "0.8");
                            $("#tooltip-container").show();
                            
                            var coordinates = d3.mouse(this);
                            
                            var map_width = $('.states-choropleth')[0].getBoundingClientRect().width;
                            
                            if (d3.event.layerX < map_width / 2) {
                              d3.select("#tooltip-container")
                                .style("top", (d3.event.layerY + 15) + "px")
                                .style("left", (d3.event.layerX + 15) + "px");
                            } else {
                              var tooltip_width = $("#tooltip-container").width();
                              d3.select("#tooltip-container")
                                .style("top", (d3.event.layerY + 15) + "px")
                                .style("left", (d3.event.layerX - tooltip_width - 30) + "px");
                            }
                        })
                        .on("mouseout", function() {
                                $(this).attr("fill-opacity", "1.0");
                                $("#tooltip-container").hide();
                            });
                  
                    svg.append("path")
                        .datum(topojson.mesh(us, us.objects.states, function(a, b) { return a !== b; }))
                        .attr("class", "states")
                        .attr("transform", "scale(" + SCALE + ")")
                        .attr("d", path);
                  });
                  
                  });
                });
            </script>

	</body>
</html>
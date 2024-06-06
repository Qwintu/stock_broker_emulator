    <!--main content start-->
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Текущий инвестиционный портфель</h3>
        <div class="row mt">
          <!-- /col-lg-9 -->
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>  Список бумаг в портфеле</h4>
                <section id="unseen" class="col-md-9">
                  <div class="table" >
                    <table cellpadding="0" cellspacing="0" border="0" class="info display table table-bordered" id="hidden-table-info"></table>
                  </div>
                </section>
              <!-- /wrapper -->
              <section class="wrapper">
                <div class="row">
                  <div class="col-lg-9 main-chart">
                    <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                      <div class="col-md-4 col-sm-4 mb">
                      <div class="grey-panel pn donut-chart">
                      <div class="grey-header">
                      <h5>SERVER LOAD</h5>
                      </div>
                      <canvas id="serverstatus01" height="120" width="120"></canvas>
                        <script>
                          var doughnutData = [{
                              value: 70,
                              color: "#FF6B6B"
                            },
                            {
                              value: 30,
                              color: "#fdfdfd"
                            }
                          ];
                          var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                        </script>
                              <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                  <p>Usage<br/>Increase:</p>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                  <h2>21%</h2>
                                </div>
                              </div>
                            </div>
                            <!-- /grey-panel -->
                          </div>
                          <!-- /col-md-4-->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                              <div class="darkblue-header">
                                <h5>DROPBOX STATICS</h5>
                              </div>
                              <canvas id="serverstatus02" height="120" width="120"></canvas>
                              <script>
                                var doughnutData = [{
                                    value: 60,
                                    color: "#1c9ca7"
                                  },
                                  {
                                    value: 40,
                                    color: "#f68275"
                                  }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                              </script>
                              <p>April 17, 2014</p>
                              <footer>
                                <div class="pull-left">
                                  <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                                </div>
                                <div class="pull-right">
                                  <h5>60% Used</h5>
                                </div>
                              </footer>
                            </div>
                            <!--  /darkblue panel -->
                          </div>
                          <!-- /col-md-4 -->
                          <div class="col-md-4 col-sm-4 mb">
                            <!-- REVENUE PANEL -->
                            <div class="green-panel pn">
                              <div class="green-header">
                                <h5>Динамика стоимости портфеля</h5>
                              </div>
                              <div class="chart mt">
                                <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                              </div>
                              <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
                            </div>
                          </div>
                          <!-- /col-md-4 -->
                        </div>
                        <!-- /row -->
                        <div class="row">
                          <!-- WEATHER PANEL -->
                          <div class="col-md-4 mb">
                            <div class="weather pn">
                              <i class="fa fa-cloud fa-4x"></i>
                              <h2>11ยบ C</h2>
                              <h4>BUDAPEST</h4>
                            </div>
                          </div>
                          <!-- /col-md-4-->
                          <!-- /col-md-8  -->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="green-panel pn">
                              <div class="green-header">
                                <h5>DISK SPACE</h5>
                              </div>
                              <canvas id="serverstatus03" height="120" width="120"></canvas>
                              <script>
                                var doughnutData = [{
                                    value: 60,
                                    color: "#2b2b2b"
                                  },
                                  {
                                    value: 40,
                                    color: "#fffffd"
                                  }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                              </script>
                              <h3>60% USED</h3>
                            </div>
                          </div>
                          <!--Сегментация начало-->
            
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="grey-panel pn donut-chart">
                              <div class="grey-header">
                                <h5>Состав портфеля</h5>
                              </div>
                                <canvas id="pie" height="120" width="120"></canvas>
            
                              <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                  <p>Usage<br/>Increase:</p>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                  <h2>21%</h2>
                                </div>
                              </div>
                            </div>              
                          <!--Сегментация финиш-->
                          <!-- /col-md-4 -->
                        </div>
                        <!-- /row -->
                      </div>
                      <!-- /col-lg-9 END SECTION MIDDLE -->
                      
                        </div>
                      </div>
          
             </section>
        </div>
        <!-- /row -->
    <!--main content end-->

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  
    <!--script for this page-->
  <script src="lib/chart-master/Chart.js"></script>


  
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Привет!',
        // (string | mandatory) the text inside the notification
        text: 'Рад тебя видеть. Приходи почаще.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 4000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>

  
  <script>
    fetch('/getInfoTicker')
      .then(response=>response.json())
      .then(result=>{
          let item = Object.keys(result).length; //кол-во итераций (длина коллекции)
          //console.log(item);
          //console.log(Object.keys(result));//кол-во строк в ответе
          //console.log(Object.entries(result[0]));//
          //console.log(Object.entries(result[1])[2]);//
          //console.log(Object.entries(result[0])[2][1])//[значение по строке][выбор столбца по кол-ву столбцов в запросе][переключатель значение или тикер 0 или 1]
          for(let i=0; i<item; i++){
            
              //let ticker_number = i*2;
              //let ticker_vol_number = i*2+1;
              //let ticker1 = Object.entries(result[0])[i*2][1];
              //console.log(ticker1);
              //let ticker_number = i*2;
              //let ticker_vol_number = i*2+1;
              //let ticker = Object.entries(result)[i][1]; //список пар значений по всем строкам из запроса
              //let ticker = result[i].ticker;
              //let ticker = result[i].sector;
              //let ticker = result[i].last_price;
              //let ticker_vol = Object.entries(result[0])[i*2][1];
              //let sector = Object.entries(result[0])[i*2+1][1];
              //console.log(ticker);

          };
          
          
      });
  </script>  
  <script>
      document.querySelector('.info').innerHTML = `
          <thead class="thead">
            <tr>
              <th>Тикер</th>
              <th class="numeric">Ср.цена покупки</th>
              <th class="numeric">Размер позиции</th>
              <th class="numeric">Инвестировано</th>
              <th class="numeric">Цена на день закрытия</th>
            </tr>
          </thead>
          <tbody class="tbody"></tbody>
          `;
      fetch('/getUserInfo')
        .then(response=>response.json())
        .then(result=>{
            //console.log(result[0]);
            let res = Object.keys(result[0]).length;
            for(let i=0; i<res/2; i++){
                let ticker_number = i*2;
                let ticker_vol_number = i*2+1;
                let ticker = Object.keys(result[0])[i*2];
                let ticker_vol = Object.entries(result[0])[i*2][1];
                let ticker_price = Object.entries(result[0])[i*2+1][1];
                //console.log(ticker, ticker_vol, ticker_price);
                document.querySelector('.tbody').innerHTML += `
                  <tr id="" class="">
                      <td class="ticker">${ticker}</td>
                      <td class="price">${ticker_price}</td>
                      <td class="change">${ticker_vol}</td>
                      <td class="invest">${ticker_price*ticker_vol}</td>
                      <td class="close2">${ticker}</td>
                      
                  </tr>`; 
                //console.log(ticker, ticker_vol, ticker_price);
            };
        });
  
  </script>  

    <script>
      let value2 = [80,50,100];
      let value1 =[];
      value1.push(value2);
      let value = value1[0];
      console.log(value[0]);
      console.log(value2);
        var pieData = [{
                value: value[0],
                color:"#1abc9c"
            },
            {
                value : value[1],
                color : "#16a085"
            },
            {
                value : value[2],
                color : "#27ae60"
            }
    
        ];
    
    
    new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
    
  </script>
</body>

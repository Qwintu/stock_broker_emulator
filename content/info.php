<!--main content start-->
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Текущий инвестиционный портфель</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i>  Список бумаг в портфеле</h4>
            <section id="unseen" class="col-md-9">
              <div class="table" >
                <table cellpadding="0" cellspacing="0" border="0" class="info display table table-bordered" id="hidden-table-info"></table>
              </div>
            </section>

    </div>

<!--main content end-->

<script type="text/javascript">
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


<script type="text/javascript">
showInfo();  
let infoTicker = '';

function showInfo(){
  fetch('/getInfoTicker')
    .then(response=>response.json())
    .then(result=>{

      infoTicker = result;
      //infoTicker = infoTicker.get(last_price);
      //console.log(result.last_price);        
    });

    let ticker = '';
    let price = '';
    let ticker_vol = '';

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
            //let ticker_number = i*2;
            //let ticker_vol_number = i*2+1;
            ticker = Object.keys(result[0])[i*2];
            ticker_vol = Object.entries(result[0])[i*2][1];
            ticker_price = Object.entries(result[0])[i*2+1][1];
            //console.log(ticker, ticker_vol, ticker_price);
            //console.log(infoTicker[i].last_price);
              document.querySelector('.tbody').innerHTML += `
              <tr id="" class="">
                  <td class="ticker">${ticker}</td>
                  <td class="price">${ticker_price}</td>
                  <td class="change">${ticker_vol}</td>
                  <td class="invest">${(ticker_price*ticker_vol).toFixed(2)}</td>
                  <td class="close2">вывести</td>
              </tr>`;
            //console.log(ticker, ticker_vol, ticker_price);            
            //console.log(infoTicker[i].last_price);
            
        };
        //console.log(infoTicker[0].last_price);
        console.log(ticker);
        
    });
    //console.log(infoTicker);
}
</script>  

</body>

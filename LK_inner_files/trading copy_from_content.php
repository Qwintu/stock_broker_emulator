<section class="wrapper site-min-height">
  <div  class="main-content">
    <div class="row">
      <div class="col-lg-12 mt">
        <div class="open_positions">
          <div class="open_positions">
            <h4><i class="fa fa-angle-right"></i> Открытые позиции</h4>
            </div>
        </div>
        <div class="money_block d-flex justify-content-end mx-3 my-3">
            <div class="monetary_value">
              <h5 class="label_money me-3">Денежная оценка портфеля:</h5>
              <h3 id="all_the_money">Подтянуть сумму</h3>
              <span> руб.</span>
            </div>
        </div>
        <div class="main_block mb-4">
          <!-- Table-->
          <table class="position_tab table table-striped table-hover">
            <thead class="">
              <tr><th width="8%"></th><th width="11%"></th><th width="8%">Цена</th><th width="9%">Изм. цены, %</th><th width="9%">Закрытие</th><th width="10%">Средн. цена  позиции</th><th width="11%">Изм. позиции</th><th width="11%">Размер позиции, руб</th><th width="7%">Размер позиции, лоты</th><th width="7%"></th><th width="9%"></th></tr>
            </thead>
            <tbody class="portfolio_tab"></tbody>
          </table>
        </div>
        <!-- Table end-->
        <div class="money_block d-flex justify-content-end mx-3 my-3">
          <div class="affordable_money">
            <div class="label_money me-3">
              <h4><i class="fa fa-angle-right"></i>  Доступные денежные средства</h4>
            </div>
            <h3 id="available_money"></h3>
            
          </div>
        </div>
        <div class="main_block">
          <table class="stock_market_tab table table-striped table-hover">
            <thead class="">
              <tr><th width="5%"></th><th width="13%"></th><th width="16%"></th><th width="12%">Цена</th><th width="12%">Изм. цены, %</th><th width="12%">Вчерашнее закрытие</th><th width="10%"></th><th width="10%">Продать</th><th width="10%">Купить</th></tr>
            </thead>
            <tbody class="">
              <tr id="SBER" class=""><td></td><td class="ticker">SBER</td><td class="name">Сбербанк</td><td class="price">0</td><td class="change">0</td><td class="close">0</td>
                <td>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Лоты">
                </td>
                <td>
                    <button type="button" id="but_sell" class="but_sell btn btn-danger btn-xs"></button>
                </td>
                <td>
                    <button type="button" id="but_buy" class="but_buy btn btn-success btn-xs"></button>
                </td>
              </tr>
              <tr id="GAZP" class=""><td></td><td class="ticker">GAZP</td><td class="name">Газпром ао</td><td class="price">0</td><td class="change">0</td><td class="close">0</td>
                <td>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Лоты">
                </td>
                <td>
                    <button type="button" id="but_sell" class="but_sell btn btn-danger btn-xs"></button>
                </td>
                <td>
                    <button type="button" id="but_buy" class="but_buy btn btn-success btn-xs"></button>
                </td>
              </tr>
              <tr id="LKOH" class=""><td></td><td class="ticker">LKOH</td><td class="name">Лукойл</td><td class="price">0</td><td class="change">0</td><td class="close">0</td>
                <td>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Лоты">
                </td>
                <td>
                    <button type="button" id="but_sell" class="but_sell btn btn-danger btn-xs"></button>
                </td>
                <td>
                    <button type="button" id="but_buy" class="but_buy btn btn-success btn-xs"></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
    
<script>
    
    
    
    
    let sber_price = document.querySelectorAll('#SBER .price');
    let lkoh_price = document.querySelectorAll('#LKOH .price');
    let gazp_price = document.querySelectorAll('#GAZP .price');
    let rosn_price = document.querySelectorAll('#rosn .price');
    
    let sber_change = document.querySelectorAll('#SBER .change');
    let lkoh_change = document.querySelectorAll('#LKOH .change');
    let gazp_change = document.querySelectorAll('#GAZP .change');
    let rosn_change = document.querySelectorAll('#rosn .change');
    
    let sber_close = document.querySelectorAll('#SBER .close');
    let lkoh_close = document.querySelectorAll('#LKOH .close');
    let gazp_close = document.querySelectorAll('#GAZP .close');
    let rosn_close = document.querySelectorAll('#rosn .close');
    
    let btns_buy = document.querySelectorAll('.stock_market_tab .but_buy');
    let btns_sell = document.querySelectorAll('.stock_market_tab .but_sell');
    
    getAvlbMoney();  // получаем остаток денежных средств и размещаем на странице
    
    // создает таблицу с портфедем при загрузки страницы
    portf_tab_onload();
    function portf_tab_onload() {
        fetch("/getPortfolio",{
        }).then(responce=>responce.json())
          .then(result=>create_portf_tab(result));
    };
      
    //console.log(btns_sell, btns_buy);
    
    for(let i=0; i<btns_buy.length; i++){
        const but_buy = btns_buy[i];
        but_buy.addEventListener("click", ()=>{
            const formData = new FormData();
            let ticker = but_buy.parentElement.parentElement.id;
            let price = Number(but_buy.innerText);
            let vol = but_buy.parentElement.previousElementSibling.previousElementSibling.querySelector('.form_input').value;
            vol = Number(vol);
            // вписать if для проверки на ноль в лотах
            // if (!vol || vol == 0)  {break;};
            formData.append('ticker',ticker);
            formData.append('price',price);
            formData.append('vol',vol);
            formData.append('flag',"buy");  // флаг - true:покупка, false:продажа
            fetch("/transaction",{
              method:"POST",
              body:formData
            }).then(responce=>responce.json())
              .then(result=>{
                  but_buy.parentElement.previousElementSibling.previousElementSibling.querySelector('.form_input').value = "";
                  if (result == "Недостаточно средств на покупку" || result == "Недостаточно лимитов по акции" || result == "Ошибка операции"){
                      alert(result);
                      console.log(result);
                  }else{
                      getAvlbMoney();
                      create_portf_tab(result);
                  };
              });
            
            // смитрим, что в formData
            for(let pair of formData.entries()) {
               console.log(pair[0]+ ', '+ pair[1]);
            }
            
        });
    };

    for(let i=0; i<btns_sell.length; i++){
        const but_sell = btns_sell[i];
        but_sell.addEventListener("click", ()=>{
            const formData = new FormData();
            let ticker = but_sell.parentElement.parentElement.id;
            let price = Number(but_sell.innerText);
            let vol = but_sell.parentElement.previousElementSibling.querySelector('.form_input').value;
            vol = Number(vol)*(-1);
            formData.append('id',1);
            formData.append('ticker',ticker);
            formData.append('price',price);
            formData.append('vol',vol);
            formData.append('flag','sell');  // флаг - true:покупка, false:продажа
            fetch("/transaction",{
              method:"POST",
              body:formData
            }).then(responce=>responce.json())
              .then(result=>{
                  but_sell.parentElement.previousElementSibling.querySelector('.form_input').value = "";
                  if (result == "Недостаточно средств на покупку" || result == "Недостаточно лимитов по акции" || result == "Ошибка операции"){
                      alert(result);
                      console.log(result);
                  }else{
                      getAvlbMoney();
                      create_portf_tab(result);
                  };
              });
            
            // смитрим, что в formData
            for(let pair of formData.entries()) {
               console.log(pair[0]+ ', '+ pair[1]);
            }
        });
    };
    
    
    getQuotes_eod();   // получаем котировки закрытия предыдущего дня при загрузке страницы
    setInterval(getQuotes, 3000);  // получаем котировки акций каждые 3 сек и оаспихиваем их по нижней таблице
    
        function getQuotes() {
            fetch("/getQuotes")
            .then(response=>response.json())
            .then(result=>{
                //console.log(result);
                lkoh_price[0].innerHTML = result.LKOH[0];
                gazp_price[0].innerHTML = result.GAZP[0];
                sber_price[0].innerHTML = result.SBER[0];
                
                lkoh_change[0].innerHTML = result.LKOH[4];
                gazp_change[0].innerHTML = result.GAZP[4];
                sber_change[0].innerHTML = result.SBER[4];
                
                for(let i=0; i<btns_sell.length; i++){
                    const but_sell = btns_sell[i];
                    a = Number(but_sell.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
                    but_sell.innerText = Math.floor((a*0.995) * 100) / 100;
                };
                
                for(let i=0; i<btns_buy.length; i++){
                    const but_buy = btns_buy[i];
                    a = Number(but_buy.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
                    but_buy.innerText = Math.floor((a*1.005) * 100) / 100;
                };
                
            });
        };
        
        function getQuotes_eod() {
            fetch("/getQuotes_eod")
            .then(response=>response.json())
            .then(result=>{
                //console.log(result);
                lkoh_close[0].innerHTML = result.LKOH;
                gazp_close[0].innerHTML = result.GAZP;
                sber_close[0].innerHTML = result.SBER;
            });
        };
        
        // получаем остаток денежных средств и размещаем на странице
        function getAvlbMoney() {
            fetch("/getAvlbMoney")
            .then(response=>response.text())
            .then(result=>{
                document.querySelector('#available_money').innerText = `${result} rub`;
                //console.log(a);
            });
        };
        
        //let ticker_list = 1;
        //ticker_list = getTickerList();
        /*let cc = [];
        cc = getTickerList();
        console.log(cc);
        function getTickerList(){
            fetch('getTickerList.php')
            .then(response=>response.json())
        };*/
        
        let cc;
        fetch('/getTickerList')
            .then(response=>response.json())
            .then(result=>{cc = result});
        //console.log(cc);
        
        function create_portf_tab(portfolio){
            //console.log(Object.keys(portfolio));
            //console.log(Object.entries(portfolio));
            //console.log(portfolio);
            let ticker_qnt = Object.keys(portfolio).length/2;
            document.querySelector('.portfolio_tab').innerHTML = "";
            let portfolio_tab = document.querySelector('.portfolio_tab');
           
            
            for(let i=0; i<ticker_qnt; i++){
                let ticker_number = i*2;
                let ticker__vol_number = i*2+1;
                let b = Object.entries(portfolio)[i][1];
                console.log(b);
                portfolio_tab.innerHTML += `
                    <tr id="${Object.keys(portfolio)[i*2]}" class="">
                        <td class="ticker">${Object.keys(portfolio)[i*2]}</td>
                        <td class="name">Сбербанк</td>
                        <td class="price"></td>
                        <td class="change"></td>
                        <td class="close"></td>
                        <td class="avg_price">${Object.entries(portfolio)[i*2+1][1]}</td>
                        <td class="change_pos"> руб</td>
                        <td class="pos_vol_r"></td>
                        <td class="pos_vol_l">${Object.entries(portfolio)[i*2][1]}</td>
                        <td><input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Лоты"></td>
                        <td><button type="button" id="but_sell" class="but_sell btn btn-danger btn-xs">1144.00</button></td>
                    </tr>`;
                
            };
            document.querySelector('.portfolio_tab .price').innerHTML = 111;
            //console.log(document.querySelector('.portfolio_tab .name'));
            //console.log(a);  ${postTab[i].author}
        };
        
    </script>

    


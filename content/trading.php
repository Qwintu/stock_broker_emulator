
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link href="/css/style_lk.css" rel="stylesheet" />
  
<section class="wrapper site-min-height">
<div  class="main-content">
<div class="container">
<div class="money_block d-flex justify-content-end mx-3 my-3">
    <div class="monetary_value"><span class="label_money me-3">Денежная оценка портфеля:</span><span id="all_the_money">1000000</span><span> руб.</span></div>
</div>

<div class="main_block mb-4">
    <div class="open_positions">Открытые позиции</div>
    
    <table class="position_tab table table-striped table-hover">
      <thead class="">
        <tr class="header_op_tab"><th width="10%"></th></th><th width="12%">Цена</th><th width="16%">Изм. цены за день, %</th><th width="0%"></th><th width="15%">Средн. цена  позиции</th><th width="15%">Изм. позиции, руб</th><th width="18%">Размер позиции, руб</th><th width="13%">Размер позиции, лоты</th></tr>
      </thead>
      <tbody class="portfolio_tab">

      </tbody>
    </table>
    
</div>


<div class="money_block d-flex justify-content-end mx-3 my-3">
    <div class="affordable_money"><span class="label_money me-3">Доступные денежные средства:</span><span id="available_money"></span><span> руб.</span></div>
</div>

<div class="main_block">
    <table class="stock_market_tab table table-striped table-hover">
      <thead class="">
        <tr><th width="5%"></th><th width="13%"></th><th width="16%"></th><th width="12%">Цена</th><th width="12%">Изм. цены, %</th><th width="12%">Вчерашнее закрытие</th><th width="10%"></th><th width="10%">Продать</th><th width="10%">Купить</th></tr>
      </thead>
      <tbody class="">
        <tr id="SBER" class=""><td></td><td class="ticker">SBER</td><td class="name">Сбербанк</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="GAZP" class=""><td></td><td class="ticker">GAZP</td><td class="name">Газпром ао</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="LKOH" class=""><td></td><td class="ticker">LKOH</td><td class="name">Лукойл</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="ROSN" class=""><td></td><td class="ticker">ROSN</td><td class="name">Роснефть</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="VTBR" class=""><td></td><td class="ticker">VTBR</td><td class="name">ВТБ ао</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="TATN" class=""><td></td><td class="ticker">TATN</td><td class="name">Татнфт 3ао</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="GMKN" class=""><td></td><td class="ticker">GMKN</td><td class="name">ГМКНорНик</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="POLY" class=""><td></td><td class="ticker">POLY</td><td class="name">Polymetal</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="AFKS" class=""><td></td><td class="ticker">AFKS</td><td class="name">Система ао</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="MOEX" class=""><td></td><td class="ticker">MOEX</td><td class="name">МосБиржа</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
        <tr id="NLMK" class=""><td></td><td class="ticker">NLMK</td><td class="name">НЛМК ао</td><td class="price">0</td><td class="change">0</td><td class="close_">0</td>
            <td>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form_input form-control-sm" placeholder="Акции">
            </td>
            <td>
                <button type="button" id="but_sell" class="but_sell btn btn-outline-danger btn-sm"></button>
            </td>
            <td>
                <button type="button" id="but_buy" class="but_buy btn btn-outline-success btn-sm"></button>
            </td>
        </tr>
      </tbody>
    </table>
</div>

</div>
</div>
</section>
    

    <script>
    
    
    
    
    let sber_price = document.querySelectorAll('#SBER .price');
    let lkoh_price = document.querySelectorAll('#LKOH .price');
    let gazp_price = document.querySelectorAll('#GAZP .price');
    let rosn_price = document.querySelectorAll('#ROSN .price');
    let tatn_price = document.querySelectorAll('#TATN .price');
    let gmkn_price = document.querySelectorAll('#GMKN .price');
    let poly_price = document.querySelectorAll('#POLY .price');
    let afks_price = document.querySelectorAll('#AFKS .price');
    let vtbr_price = document.querySelectorAll('#VTBR .price');
    let nlmk_price = document.querySelectorAll('#NLMK .price');
    let moex_price = document.querySelectorAll('#MOEX .price');
    
    let sber_change = document.querySelectorAll('#SBER .change');
    let lkoh_change = document.querySelectorAll('#LKOH .change');
    let gazp_change = document.querySelectorAll('#GAZP .change');
    let rosn_change = document.querySelectorAll('#ROSN .change');
    let tatn_change = document.querySelectorAll('#TATN .change');
    let gmkn_change = document.querySelectorAll('#GMKN .change');
    let poly_change = document.querySelectorAll('#POLY .change');
    let afks_change = document.querySelectorAll('#AFKS .change');
    let vtbr_change = document.querySelectorAll('#VTBR .change');
    let nlmk_change = document.querySelectorAll('#NLMK .change');
    let moex_change = document.querySelectorAll('#MOEX .change');
    
    let sber_close = document.querySelectorAll('#SBER .close_');
    let lkoh_close = document.querySelectorAll('#LKOH .close_');
    let gazp_close = document.querySelectorAll('#GAZP .close_');
    let rosn_close = document.querySelectorAll('#ROSN .close_');
    let tatn_close = document.querySelectorAll('#TATN .close_');
    let gmkn_close = document.querySelectorAll('#GMKN .close_');
    let poly_close = document.querySelectorAll('#POLY .close_');
    let afks_close = document.querySelectorAll('#AFKS .close_');
    let vtbr_close = document.querySelectorAll('#VTBR .close_');
    let nlmk_close = document.querySelectorAll('#NLMK .close_');
    let moex_close = document.querySelectorAll('#MOEX .close_');
    
    let btns_buy = document.querySelectorAll('.stock_market_tab .but_buy');
    let btns_sell = document.querySelectorAll('.stock_market_tab .but_sell');
    
    getAvlbMoney();  // получаем остаток денежных средств и размещаем на странице
    let AvlbMoney = 0;
    
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
                  if (result == "Недостаточно средств на покупку" || result == "Недостаточно лимитов по акции" || result == "Введите количество акций больше нуля" || result == "Ошибка операции"){
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
                  if (result == "Недостаточно средств на покупку" || result == "Недостаточно лимитов по акции"|| result == "Введите количество акций больше нуля" || result == "Ошибка операции"){
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
                console.log(result);
                lkoh_price[0].innerHTML = result.LKOH[0];
                gazp_price[0].innerHTML = result.GAZP[0];
                sber_price[0].innerHTML = result.SBER[0];
                rosn_price[0].innerHTML = result.ROSN[0];
                tatn_price[0].innerHTML = result.TATN[0];
                gmkn_price[0].innerHTML = result.GMKN[0];
                poly_price[0].innerHTML = result.POLY[0];
                afks_price[0].innerHTML = result.AFKS[0];
                moex_price[0].innerHTML = result.MOEX[0];
                vtbr_price[0].innerHTML = result.VTBR[0];
                nlmk_price[0].innerHTML = result.NLMK[0];
                
                lkoh_change[0].innerHTML = result.LKOH[4];
                gazp_change[0].innerHTML = result.GAZP[4];
                sber_change[0].innerHTML = result.SBER[4];
                rosn_change[0].innerHTML = result.ROSN[4];
                tatn_change[0].innerHTML = result.TATN[4];
                gmkn_change[0].innerHTML = result.GMKN[4];
                poly_change[0].innerHTML = result.POLY[4];
                afks_change[0].innerHTML = result.AFKS[4];
                moex_change[0].innerHTML = result.MOEX[4];
                vtbr_change[0].innerHTML = result.VTBR[4];
                nlmk_change[0].innerHTML = result.NLMK[4];
                
                for(let i=0; i<btns_sell.length; i++){
                    const but_sell = btns_sell[i];
                    a = Number(but_sell.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
                    but_sell.innerText = Math.round((a*0.995) * 100) / 100;
                };
                
                for(let i=0; i<btns_buy.length; i++){
                    const but_buy = btns_buy[i];
                    a = Number(but_buy.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
                    but_buy.innerText = Math.round((a*1.005) * 100) / 100;
                };
                
                let portf_assessment = 0;  // оценочная стоимость портфеля
                for(let i=0; i<Object.keys(result).length; i++){
                    let tick = Object.keys(result)[i];
                    let row = document.querySelector("[data-name=" + CSS.escape(tick) + "]");
                    if(row == null){
                        //console.log("not find");  
                        // если тикер из массива result отсутствует в портфеле, то row становится null и в row.children вылетает ошибка и перебор останавливается
                    }else{
                        let price_tick = Math.round(Number((result[tick][0])) * 100) / 100;
                        let change_pers_tick = result[tick][4];
                        let change_rub_tick = Math.round((result[tick][2]) * 100) / 100;
                        
                        let price_sell = row.children[1];
                        let price_change_pers = row.children[2];
                        let pos_change_rub_sell = row.children[5];
                        let pos_vol = Number(row.children[7].innerText);
                        let pos_avg_price = Number(row.children[4].innerText);
                        
                        if (pos_vol > 0){
                            pos_change_rub = pos_vol * (price_tick - pos_avg_price);
                            pos_change_rub_sell.innerText = Math.round(pos_change_rub * 100) / 100;
                        }else if (pos_vol < 0) {
                            pos_change_rub = pos_vol * (price_tick - pos_avg_price)*(-1);
                            pos_change_rub_sell.innerText = Math.round(pos_change_rub * 100) / 100;
                        }else{
                            pos_change_rub_sell.innerText = "error"
                        };
                        
                        portf_assessment += pos_vol * price_tick;
                        
                        
                        price_change_pers.innerHTML = change_pers_tick;
                        price_sell.innerHTML = price_tick;  // текущая цена в таблице портфеля
                        
                        //pos_change_rub.innerHTML = 
                        //console.log(tick);
                        //console.log(pos_vol);
                    };
                };
                portf_assessment = portf_assessment + Number(AvlbMoney);
                portf_assessment = new Intl.NumberFormat('ru-RU').format(portf_assessment);
                document.querySelector('#all_the_money').innerHTML = portf_assessment;
                //console.log(portf_assessment);
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
                rosn_close[0].innerHTML = result.ROSN;
                tatn_close[0].innerHTML = result.TATN;
                gmkn_close[0].innerHTML = result.GMKN;
                poly_close[0].innerHTML = result.POLY;
                afks_close[0].innerHTML = result.AFKS;
                moex_close[0].innerHTML = result.MOEX;
                vtbr_close[0].innerHTML = result.VTBR;
                nlmk_close[0].innerHTML = result.NLMK;
            });
        };
        
        // получаем остаток денежных средств и размещаем на странице
        function getAvlbMoney() {
            fetch("/getAvlbMoney")
            .then(response=>response.text())
            .then(result=>{
                AvlbMoney = result;
                result = new Intl.NumberFormat('ru-RU').format(result);
                document.querySelector('#available_money').innerText = result;
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
        
        
        fetch('/getTickerList')  //не используем
            .then(response=>response.json())
            .then(result=>{cc = result});
        
        function create_portf_tab(portfolio){
            //console.log(Object.keys(portfolio));
            console.log(Object.entries(portfolio));
            let ticker_qnt = Object.keys(portfolio).length/2;
            document.querySelector('.portfolio_tab').innerHTML = "";
            let portfolio_tab = document.querySelector('.portfolio_tab');
           
            
            for(let i=0; i<ticker_qnt; i++){
                let ticker_number = i*2;
                let ticker__vol_number = i*2+1;
                let b = Object.entries(portfolio)[i][1];
                let pos_rub = Object.entries(portfolio)[i*2][1] *  Object.entries(portfolio)[i*2+1][1];
                pos_rub = Math.round((pos_rub) * 100) / 100;
                pos_rub = new Intl.NumberFormat('ru-RU').format(pos_rub);
                portfolio_tab.innerHTML += `
                    <tr id="${Object.keys(portfolio)[i*2]}" class="portf_row" data-name="${Object.keys(portfolio)[i*2]}">
                        <td class="ticker">${Object.keys(portfolio)[i*2]}</td>
                        <td class="price"></td>
                        <td class="change"></td>
                        <td class="close_"></td>
                        <td class="avg_price">${Object.entries(portfolio)[i*2+1][1]}</td>
                        <td class="change_pos"> руб</td>
                        <td class="pos_vol_r">${pos_rub}</td>
                        <td class="pos_vol_l">${Object.entries(portfolio)[i*2][1]}</td>
                    </tr>`;
                
            };
        };
        
    </script>

    


<?php
require_once "autoload.php";

//$dollarJSon = new Dollar("https://www.cbr-xml-daily.ru/daily_json.js", new DeserializerJSonDollar(), 'USD');
//echo $dollarJSon->write();

//$dollarXML = new Dollar("https://www.cbr-xml-daily.ru/daily_utf8.xml", new DeserializerXMLDollar(), 'USD');
//echo $dollarXML->write();

//$dollar = new Dollar(['https://www.cbr-xml-daily.ru/daily_json.js', "https://www.cbr-xml-daily.ru/daily_utf8.xml"], [new DeserializerJSonDollar(), new DeserializerXMLDollar()], 'USD');
//echo $dollar->write();
//$dollar = new Dollar([new DeserializerJSonDollar('https://www.cbr-xml-daily.ru/daily_json.js'), new DeserializerXMLDollar('https://www.cbr-xml-daily.ru/daily_utf8.xml')], $_GET['Currency']);

function echoCurrency()
{
        if (isset($_GET['Currency'])) {
            $dollar = new Dollar(['https://www.cbr-xml-daily.ru/daily_json.js', new DeserializerJSonDollar(), 'https://www.cbr-xml-daily.ru/daily_utf8.xml', new DeserializerXMLDollar()], $_GET['Currency']);
            //$dollar = new Dollar([new DeserializerJSonDollar('https://www.cbr-xml-daily.ru/daily_json.js'), new DeserializerXMLDollar('https://www.cbr-xml-daily.ru/daily_utf8.xml')], $_GET['Currency']);
            return $dollar->write();
        }
        elseif (isset($_GET['getArray'])) {
//            $dataContents = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js');
//            $jsonDecoded = json_decode($dataContents, true);
//            return json_encode(array_keys($jsonDecoded['Valute']));
            $dataContents = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js');
            $jsonDecoded = json_decode($dataContents, true);
            $result = [];
            $keys = array_keys($jsonDecoded['Valute']);
            for ($i = 0; $i < count($keys); $i++) {
                $result[$keys[$i]] .= $jsonDecoded['Valute'][$keys[$i]]['Value'];
            }
            return json_encode($result);
        }else {
            return <<<HTML
    <script type="text/javascript">
    // fetch('http://localhost:44000?Currency=USD',{
    //     method: 'get',
    // })
    //     .then(data => {
    //         console.log(data.json().then(d => console.log(d)))
    //     });
    // console.log('will print before php data');
    
    function getTime()
    {
        let today = new Date();
        return today.toLocaleTimeString();
    }
    function setIntervalFunction()
    {
        let intervalF = setInterval(
            function () {
                const val = document.getElementById('curr-value').value;
                if (val) {
                    fetch('http://localhost:44000?Currency=' + val,{method: 'get'} )
                    .then(data => data.json().then(result => {
                        addElement(result[1], getTime(), val);
                    }));
                    } else{
                    clearInterval(intervalF);
                }
            }, 
            2000
        );
    }
        // try{
        //     fetch('http://localhost:44000?Currency=' + val,{method: 'get'} )
        //     .then(data => data.json().then(result => {
        //         addElement(result[1], getTime(), val);
        // })); 
        // }
        // catch (error){
        //     addElement(error);
        //     clearInterval(intervalF);
        // }
        
        // let res = getTime() + " - " + "$$$";
        // return res;
    
    // document.body.onload = setIntervalFunction;
    
    // function getCurrencyArray()
    // {
    //     fetch('http://localhost:44000',{method: 'get'} )
    //     .then(data => data.json().then(result => {
    //         console.log(result);
    //     }));
    // }
// getCurrencyArray();
    function echoCurrency(value)
    {
        if (value) {
            fetch('http://localhost:44000?Currency=' + value,{method: 'get'} )
            .then(data => data.json().then(result => {
                addElement(result[1], getTime(), value);
            }));
        }
    }
    
    function addElement(currency, date, type)
    {
        const newDiv = document.createElement("div");
        const newContent = document.createTextNode(currency + ' ' + date + ' ' + type);
        newDiv.appendChild(newContent);
        const currentDiv = document.getElementById("div1");
        document.body.insertBefore(newDiv, currentDiv);
    }
    
    function addElementArray(val)
    {
        if (typeof(val) === typeof[]) {
            for (let i = 0; i < val.length; i++) {
                let option = document.createElement("option");
                option.text = val[i];
                option.value = val[i];
                let select = document.getElementById("select-currency");
                select.appendChild(option);
            }
        }
    }
    
    function getValues()
    {
        fetch('http://localhost:44000?getArray=1',{method: 'get'} )
        .then(data => data.json().then(result => {
            addElementArray(Object.keys(result));
            vals.push(result);
        }));
    }
    getValues();
    let vals = [];
    console.log(vals);
    
    </script>

    <form id="reset-me">
        <select id="select-currency" onchange="addElement(vals[0][this.value], getTime(), this.value)"> 
            <option value="">-</option>
        </select>
        ОБНАРУЖЕНА ХАЛЯВА: <input id="curr-value" type="text" name="Currency">
        <input onclick="setIntervalFunction()" id="btn" type="button" value="ВЗЯТЬ">
        <input onclick="resetForm('reset-me')" id="reset-btn" type="button" value="-">
    </form>


HTML;
        }
}


echo echoCurrency();

?>

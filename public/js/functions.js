

function addImg(source)
{
    if (typeof(source) === typeof[]) {
        for (let i = 0; i < source.length; i++) {
        const imgElement = document.createElement("img");
        imgElement.src = source[i];
        imgElement.alt = source[i];
        imgElement.id = 'img-' + i;
        document.body.appendChild(imgElement);
        }
    }
}
function addAnchorArray(anchorArray)
{
    if (typeof(anchorArray) === typeof[]) {
        for (let i = 0; i < anchorArray.length; i++) {
            const imgElement = document.createElement("a");
            imgElement.href = '/getImages' + 'userId=' + anchorArray[i];
            document.body.appendChild(imgElement);
        }
    }
}
function getUserId()
{
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    return urlParams.get('userId');
}
function getImg()
{
    fetch('http://localhost:44000/get-data?userId=' + getUserId(),{method: 'get'} )
        .then(data => data.json().then(result => {
            addImg(result);console.log(result);
        }));
}
function saveImg()
{
    const url = document.getElementById('url-input').value;
    fetch('http://localhost:44000/saveMe?saveMe=' + url,{method: 'get'} )
        .then(data => data.json().then(result => {
        addImg([result]);
    }));
}
function resetForm(id)
{
    document.getElementById(id).reset()
}
function addElement(currency, date, type)
{
    const newDiv = document.createElement("div");
    const newContent = document.createTextNode(currency + ' ' + date + ' ' + type);
    newDiv.appendChild(newContent);
    const currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);
}
function getCurrencyXML()
{
    fetch('https://www.cbr.ru/scripts/XML_daily.asp?date_req=11-11-2023' ,{method: 'get'} )
        .then(data => data.json().then(result => {
            addElement(result);console.log(result);
        }));
}


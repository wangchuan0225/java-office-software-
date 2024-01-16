var Id;var Name;
var birDate;var curdate=new Date();
var Dep;var Pos;
function valuecheck(){  //检查数据合法性
Id=document.getElementById('ID').value;
Name=document.getElementById('Name').value;
var bir=document.getElementById('Birth').value;
Dep=document.getElementById('Dep').value;
Pos=document.getElementById('Pos').value;
birDate=new Date(bir+'T00:00:00');
console.log(birDate);
console.log(curdate);
if(!(/^\d+$/.test(Id))) {alert("工号格式错误！");return false;}
else if(Id.length!==10) {alert("工号长度错误！");return false;}
else if(Name.length===0) {alert("请填写姓名！");return false;}
else if(Name.length>20) {alert("姓名长度超出限制！");return false;}
else if(bir==='') {alert("请填写出生日期！");return false;}
// Date包含时分秒,没有办法直接检查当天的日期
else if(birDate>=curdate) {alert("请输入合法日期！");return false;}
else if(Dep.length===0) {alert("请填写部门！");return false;}
else if(Pos.length===0) {alert("请填写职务！");return false;}
else return true;
}
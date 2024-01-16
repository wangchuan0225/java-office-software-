<template>

  
<div class="add_element">
 
    <h2 class="type1">更改薪资</h2>
    
    <el-input
      placeholder="请输入id"
      suffix-icon="el-icon-user"
      v-model="id"
      background-color="'red'"
  >
    </el-input>
    <el-input
      size="small"
      placeholder="请输入basic_salary"
      suffix-icon="el-icon-document-checked"
      v-model="basic_salary">
    </el-input>
    <el-input
      size="mini"
      placeholder="请输入performance_salary"
      suffix-icon="el-icon-date"
      v-model="performance_salary">
    </el-input>
    
    <el-button class="btn-1" type="warning" round @click="modify()" style="margin-top: 10px; margin-bottom: 10px;margin-left: 48%;">更改</el-button>
  </div>
  </template>
  <script>
  import axios from 'axios';
  export default{
    methods:{
        async modify(){
      try{
        if (!this.id  ) {
        alert('请输入所有字段'); // 如果某些字段为空，则弹出提示
        return; // 停止执行
      }
        // 发送POST请求到后端的特定端点
          const response = await axios.post('http://localhost:8088/updatesalary', {
          id:this.id,
          basic_salary:this.basic_salary,
          performance_salary:this.performance_salary,
        });
        console.log('来自后端的响应:', response.data);
        if(response.data==-1)
        {
          alert("用户不存在");
          return
        }
        
        alert("成功更改")
      }catch(error){
         // 处理请求期间发生的任何错误
         console.error('发送数据到后端时出错:', error);
    this.tableData = null;
      
    // 在控制台输出错误信息
    console.log('发送数据到后端时出错:', error);

    // 使用弹窗输出错误信息
    alert('输入id出错！ ' );
      }
    }
    },
data(){
    return{
        id:"",
        basic_salary:"",
        performance_salary:"",
    }

}

  }
</script>
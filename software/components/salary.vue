<template>
<div class="bl-content" id="test">
<h2 class="type1">输入查询薪水情况</h2>
<div class="bl-content" id="test" style="display: flex; justify-content: center; align-items: center;margin-left: 5px;">
<div class="col-3 input-effect" style="width: 16%">
  <input type="text" placeholder="input id" v-model="sentence1">
  <span class="focus-border">
    <i></i>
  </span>
</div>
</div>
<el-button class="btn-1" type="info" round @click="selectsalary()" style="margin-top: 10px; margin-bottom: 10px;margin-left: 47%;">查询</el-button>
<el-table
  :data="tableData"
  height="200"
  border
  style="width: 100%; background-color: #a0a8af;">
  <el-table-column
    prop="id"
    label="id"
    width="110">
  </el-table-column>
  <el-table-column
    prop="basic_salary"
    label="基础工资"
    width="150">
  </el-table-column>
  <el-table-column
    prop="performance_salary"
    label="绩效工作">
  </el-table-column>
  <el-table-column
    prop="performance"
    label="绩效">
  </el-table-column>
  <el-table-column
    prop="actual_salary"
    label="实际工资">
  </el-table-column>
</el-table>



</div>
</template>


<script>
import axios from 'axios';
export default{
    methods:{
        async selectsalary(){
            try{
                const response=await axios.post("http://localhost:8088/selectsalary",{
                    sentence1:this.sentence1,
                });
                this.tableData=response.data,
                console.log('来自后端的响应:', response.data);
      // 在发送到后端后重置 sentence1 和 sentence2（可选）
                this.sentence1 = '';
            }
            catch(error){
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
            sentence1:"",
            tableDate:[],
        }
    }
}
</script>
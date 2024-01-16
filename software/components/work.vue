<style>
.type1{color: blueviolet;
font-size: 40px;
font-weight: bold;}
</style>

<template>
  <div class="bl-content" id="test">
<h2 class="type1">输入查询工作情况</h2>
<div class="bl-content" id="test" style="display: flex; justify-content: center; align-items: center;">
<div class="col-3 input-effect" style="width: 16%">
  <input type="text" placeholder="input id" v-model="sentence1">
  <span class="focus-border">
    <i></i>
  </span>
</div>
</div>
<el-button class="btn-1" type="warning" icon="el-icon-star-off" @click="compute_sentence()" style="margin-top: 10px; margin-bottom: 10px;margin-left: 45%;">查询</el-button>

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
    prop="name"
    label="姓名"
    width="150">
  </el-table-column>
  <el-table-column
    prop="task"
    label="工作量">
  </el-table-column>
  <el-table-column
    prop="efficiency"
    label="工作效率">
  </el-table-column>
  <el-table-column
    prop="quality"
    label="工作质量">
  </el-table-column>
  <el-table-column
    prop="attitude"
    label="工作态度">
  </el-table-column>
  <el-table-column
    prop="completionrate"
    label="完成率">
  </el-table-column>
  
</el-table>

</div>
</template>
<script>
import axios from 'axios';
export default {
  methods: {
  async compute_sentence() {
    try {
      // 发送POST请求到后端的特定端点
      const response = await axios.post('http://localhost:8088/your-backend-endpoint', {
        sentence1: this.sentence1,
      });
      this.tableData=response.data

      // 根据需要处理响应
      console.log('来自后端的响应:', response.data);

      // 在发送到后端后重置 sentence1 和 sentence2（可选）
      this.sentence1 = '';
      

    } catch (error) {
      console.error('发送数据到后端时出错:', error);
    this.tableData = null;

    // 在控制台输出错误信息
    console.log('发送数据到后端时出错:', error);

    // 使用弹窗输出错误信息
    alert('输入id出错！ ' );
    }
  }
},
  data() {
    return {
      sentence1:'',
      sentence2:'',
      tableData:[]
    }
  }
}
</script>

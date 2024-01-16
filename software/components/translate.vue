<style>
.type1{color: rgb(164, 132, 149);
font-size: 40px;
font-weight: bold;
text-align: center;
}
.addelement{
 background-color:beige;
}
</style>
<template>
 
    <div class="bl-content" id="test">
	<h2 class="type1">输入查询所有</h2>
	<div class="bl-content" id="test" style="display: flex; justify-content: center; align-items: center;">
  <div class="col-3 input-effect" style="width: 16%">
    <input type="text" placeholder="input id" v-model="sentence1" >
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
    <!-- 表格内容 -->
    <el-table-column
      prop="id"
      label="id"
      width="110"
      >
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
    <el-table-column
        prop="attend"
        label="出勤">
      </el-table-column>
      <el-table-column
        prop="absence"
        label="旷工">
      </el-table-column>
      <el-table-column
        prop="skill"
        label="技能得分">
      </el-table-column>
      <el-table-column
        prop="knowledge"
        label="知识得分">
      </el-table-column>
      <el-table-column
        prop="sum"
        label="总分 （%）">
      </el-table-column>
  </el-table>

  <div class="add_element">
  <el-input
    placeholder="请输入id"
    suffix-icon="el-icon-user"
    v-model="id"
    background-color="'red'"
>
  </el-input>
  <el-input
    size="small"
    placeholder="请输入完成率"
    suffix-icon="el-icon-document-checked"
    v-model="completionrate">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入task"
    suffix-icon="el-icon-date"
    v-model="task">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入工作效率"
    suffix-icon="el-icon-s-order"
    v-model="efficiency">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入工作质量"
    suffix-icon="el-icon-s-marketing"
    v-model="quality">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入工作态度"
    suffix-icon="el-icon-view"
    v-model="attitude">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入知识得分"
    suffix-icon="el-icon-edit"
    v-model="knowledge">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入技能得分"
    suffix-icon="el-icon-loading"
    v-model="skill">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入出勤"
    suffix-icon="el-icon-date"
    v-model="attend">
  </el-input>
  <el-input
    size="mini"
    placeholder="请输入旷工"
    suffix-icon="el-icon-document-delete"
    v-model="absence">
  </el-input>
  <el-button class="btn-1" type="warning" icon="el-icon-star-off" @click="modify()" style="margin-top: 10px; margin-bottom: 10px;margin-left: 45%;">更改</el-button>

</div>
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
        // 处理请求期间发生的任何错误
        console.error('发送数据到后端时出错:', error);
    this.tableData = null;
    console.log('来自后端的响应:', response.data);
    if (response.data.length === 0) {
      alert('用户不存在');
      return;
      }
        // 在发送到后端后重置 sentence1 和 sentence2（可选）
        alert('成功添加！ ' );
      
    // 在控制台输出错误信息
    console.log('发送数据到后端时出错:', error);

    // 使用弹窗输出错误信息
    alert('输入id出错！ ' );
      }
    },
    async modify(){
      try{
        if (!this.id  ||!this.completionrate||!this.absence||!this.quality||!this.attend||!this.attitude||!this.task||!this.efficiency
        ||!this.knowledge||!this.skill) {
        alert('请输入所有字段'); // 如果某些字段为空，则弹出提示
        return; // 停止执行
      }
        // 发送POST请求到后端的特定端点
          const response = await axios.post('http://localhost:8088/modify', {
          id:this.id,
          completionrate:this.completionrate,
          task:this.task,
          efficiency:this.efficiency,
          quality:this.quality,
          attitude:this.attitude,
          knowledge:this.knowledge,
          skill:this.skill,
          attend:this.attend,
          absence:this.absence
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
    data() {
      return {
        sentence1:'',
        tableData:[],
        id:'',
        name:'',
        completionrate:'',
        task:'',
        efficiency:'',
        quality:'',
        attitude:'',
        knowledge:'',
        skill:'',
        attend:'',
        absence:''
      }
    }
  }
</script>

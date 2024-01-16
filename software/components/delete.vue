<style>
.type1{color: rgb(141, 131, 151);
font-size: 40px;
font-weight: bold;}
</style>
<template>
    <div class="bl-content" id="test">
	<h2 class="type1">删除id的成绩</h2>
	<div class="bl-content" id="test" style="display: flex; justify-content: center; align-items: center;margin-left: 20%;">
  <div class="col-3 input-effect" style="width: 40%">
    <input type="text" placeholder="input id" v-model="sentence1">
    <span class="focus-border">
      <i></i>
    </span>
  </div>
</div>
<el-button class="btn-1" type="danger" plain style="margin-top: 10px; margin-bottom: 10px;margin-left: 47%;" @click="deletefunc()">删除</el-button>
    </div>
</template>
<script>
import axios from 'axios';
  export default {
    methods: {
    async deletefunc() {
      try {
        // 发送POST请求到后端的特定端点
        const response = await axios.post('http://localhost:8088/delete', {
          sentence1: this.sentence1,
        });
        this.tableData=response.data

        // 根据需要处理响应
        console.log('来自后端的响应:', response.data);
        if(response.data==-1)
        {
          alert("用户不存在");
          return
        }
        // 在发送到后端后重置 sentence1 和 sentence2（可选）
        else
        alert('成功插入！ ' );

      } catch (error) {
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
      }
    }
  }
</script>
<template>
    <div class="id" id="test">
    <h2 class="type1">增加绩效</h2>
    <div class="add_element">
  <el-input
    placeholder="请输入id"
    suffix-icon="el-icon-user"
    v-model="id">
  </el-input>
  <el-input
    size="small"
    placeholder="basic_salary"
    suffix-icon="el-icon-document-checked"
    v-model="basic_salary">
  </el-input>
  <el-input
    size="mini"
    placeholder="performence_salary"
    suffix-icon="el-icon-date"
    v-model="performance_salary">
  </el-input>
</div>
<el-button type="success" round class="add_element1" style="margin-top: 10px; margin-bottom: 10px;margin-left: 48%;" @click="add_sentence()">插入</el-button>

    </div>
</template>
<script>
import axios from 'axios';
export default{
  
    methods:{
        async add_sentence(){
            try {
        // 发送POST请求到后端的特定端点
        if (!this.id  ) {
        alert('请输入所有字段'); // 如果某些字段为空，则弹出提示
        return; // 停止执行
      }
        const response = await axios.post('http://localhost:8088/addsalary', {
            id:this.id,
            basic_salary:this.basic_salary,
            performance_salary:this.performance_salary,

        });
        
        // 根据需要处理响应
        console.log('来自后端的响应:', response.data);
        if(response.data==-1)
        {
          alert("用户不存在");
          return
        }
        if(response.data==-2)
        {
          alert("用户信息已存在，删除后添加");
          return
        }

        // 在发送到后端后重置 sentence1 和 sentence2（可选）
        
        alert('成功插入！ ' );

      } catch (error) {
        // 处理请求期间发生的任何错误
        console.error('发送数据到后端时出错:', error);
        alert('发送数据到后端时出错，请重试或联系管理员');
      }
        }
    },
    data(){
        return{
            id:'',
            basic_salary:'',
            performance:'',
            performance_salary:'',
            actual_salary:'',
        }

    }
}
</script>
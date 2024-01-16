<style>
.type1{color: blueviolet;
font-size: 40px;
font-weight: bold;}
</style>
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
</div>
<el-button type="primary" icon="el-icon-edit" circle class="add_element1" style="margin-top: 10px; margin-bottom: 10px;margin-left: 47%;" @click="add_sentence()">插入</el-button>

    </div>
</template>
<script>
import axios from 'axios';
export default{
  
    methods:{
        async add_sentence(){
            try {
        // 发送POST请求到后端的特定端点
        if (!this.id  ||!this.completionrate||!this.absence||!this.quality||!this.attend||!this.attitude||!this.task||!this.efficiency
        ||!this.knowledge||!this.skill) {
        alert('请输入所有字段'); // 如果某些字段为空，则弹出提示
        return; // 停止执行
      }
        const response = await axios.post('http://localhost:8088/add', {
          id:this.id,
          name:this.name,
          completionrate:this.completionrate,
          task:this.task,
          efficiency:this.efficiency,
          quality:this.quality,
        attitude:this.attitude,
        attend:this.attend,
        knowledge:this.knowledge,
        skill:this.skill,
        absence:this.absence

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
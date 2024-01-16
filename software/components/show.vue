<template>
  <el-table
    :data="tableData"
    height="250"
    border
    style="width: 90%">
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
</template>

<script>
import axios from 'axios';
  export default {
    methods:{
    },
    created:function(){
    axios.get("http://localhost:8088/user/findall").then((response)=>{
        this.tableData=response.data
        console.log(response.data)
    })
    },
    data() {
      return {
        tableData:[]
      }
    }
  }
</script>

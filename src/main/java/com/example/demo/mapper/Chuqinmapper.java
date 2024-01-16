package com.example.demo.mapper;

import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.example.demo.entity.Chuqin;
import com.example.demo.entity.User;
import org.apache.ibatis.annotations.One;
import org.apache.ibatis.annotations.Result;
import org.apache.ibatis.annotations.Results;
import org.apache.ibatis.annotations.Select;
import org.springframework.core.annotation.Order;

import java.util.List;

public interface Chuqinmapper  {
@Select("select * from chuqin where id= #{id}")
 Chuqin selectChuqinById(String id);
/*

 */
}

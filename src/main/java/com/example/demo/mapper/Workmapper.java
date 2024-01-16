package com.example.demo.mapper;

import com.example.demo.entity.Work;
import org.apache.ibatis.annotations.Select;

public interface Workmapper {
    @Select("select * from work_grade where id=#{id}")
    Work selectWorkById(String id);
}

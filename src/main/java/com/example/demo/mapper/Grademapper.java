package com.example.demo.mapper;

import com.example.demo.entity.Grade;
import org.apache.ibatis.annotations.Select;

public interface Grademapper {
    @Select("select * from exam_grade where id=#{id}")
    Grade selectGradeById(String id);
}

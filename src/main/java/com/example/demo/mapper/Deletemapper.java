package com.example.demo.mapper;

import com.example.demo.entity.Addelements;
import org.apache.ibatis.annotations.Delete;
import org.apache.ibatis.annotations.Mapper;
import org.apache.ibatis.annotations.Select;

@Mapper
public interface Deletemapper {
    @Delete("DELETE FROM work_grade where id=#{id}")
    int deletework(String id);
    @Delete("DELETE FROM chuqin where id=#{id}")
    int deletechuqin(String id);
    @Delete("DELETE FROM exam_grade where id=#{id}")
    int deleteexam(String id);
    @Delete("delete from performence where id=#{id}")
    int deleteperformence(String id);
    @Select("SELECT id FROM user WHERE id=#{id}")
    String checkinvalid(String id) ;
    @Select("SELECT id FROM chuqin where id=#{id}")
    String checkexit(String id);
}

package com.example.demo.mapper;

import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.example.demo.controlar.Addelement;
import com.example.demo.entity.Addelements;
import org.apache.ibatis.annotations.*;

@Mapper
public interface Addmapper extends BaseMapper<Addelements> {
    @Insert("INSERT INTO work_grade (id,completionrate,task,efficiency,quality,attitude) VALUES " +
            " (#{id}, #{completionrate}, #{task}, #{efficiency}, #{quality}, #{attitude})")
    int insertWorkEntity(Addelements element);
    @Insert("INSERT INTO exam_grade (id,skill_grade,know_grade) VALUES " +
            " (#{id}, #{skill},#{knowledge})")
    int insertExamEntity(Addelements element);
    @Insert("INSERT INTO chuqin(id,attend,absence) VALUES"+
    "(#{id},#{attend},#{absence})")
    int insertChuqinEntity(Addelements element);
    @Select("SELECT id FROM user WHERE id=#{id}")
    String checkinvalid(Addelements element) ;
    @Select("SELECT id FROM chuqin where id=#{id}")
    String checkexit(Addelements element);
    @Insert("insert into performence(id,performence) values" +
            "(#{id},#{performence})")
    int insertperformence(Addelements element);

}

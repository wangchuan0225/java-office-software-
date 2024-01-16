package com.example.demo.mapper;

import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.example.demo.entity.Modify;
import org.apache.ibatis.annotations.Mapper;
import org.apache.ibatis.annotations.Select;
import org.apache.ibatis.annotations.Update;

@Mapper
public interface Modifymapper extends BaseMapper<Modify> {
@Update("update work_grade set completionrate=#{completionrate},task=#{task},efficiency=#{efficiency}" +
        ",quality=#{quality},attitude=#{attitude} where id=#{id};")
    int modifywork(Modify modify);
@Update("UPDATE exam_grade SET skill_grade=#{skill},know_grade=#{knowledge} WHERE id=#{id};")
    int modifyexam(Modify modify);
@Update("update chuqin set attend=#{attend},absence=#{absence} where id=#{id};")
    int modifychuqin(Modify modify);
@Update("update performence set performence=#{performence} where id=#{id};")
    int modifyperformence(Modify modify);
@Select("select id from user where id=#{id}")
    String checkid(Modify modify);
}

package com.example.demo.mapper;
import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.example.demo.entity.Chuqin;
import com.example.demo.entity.User;
import com.example.demo.entity.Work;
import org.apache.ibatis.annotations.*;
import  com.example.demo.entity.showuser;
import org.springframework.web.bind.annotation.CrossOrigin;

import java.security.Guard;
import java.util.List;
@Mapper
public interface Usermapper extends BaseMapper<User> {
    @Select("select * from user where id=#{userId}")
    @Results(
            {
                    @Result(column="id",property="id"),
                    @Result(column="name",property="name"),
                    @Result(column = "id",property = "chuqin",javaType = Chuqin.class,
                    many = @Many(select="com.example.demo.mapper.Chuqinmapper.selectChuqinById")),
                    @Result(column="id",property = "work",javaType = Work.class,
                    many=@Many(select="com.example.demo.mapper.Workmapper.selectWorkById")),
                    @Result(column="id",property="grade",javaType = Guard.class,
                    many = @Many(select="com.example.demo.mapper.Grademapper.selectGradeById"))

            }
    )
    List<User> selectAllUserAndChuqin(@Param("userId") String userId);

}

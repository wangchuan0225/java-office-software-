package com.example.demo.mapper;

import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.example.demo.entity.Addelements;
import com.example.demo.entity.Salary;
import org.apache.ibatis.annotations.*;

import java.util.List;

@Mapper
public interface Salarymapper extends BaseMapper<Salary> {
    @Update("update salary SET performance=#{performance} where id=#{id}")
    Integer updateperformance(double performance,String id);
    @Select("select * from salary where id=#{id}")
    List<Salary> selectAllSalary(String id);
    @Insert("insert into salary(id,basic_salary,performance_salary,performance,actual_salary) values(#{id},#{basic_salary},#{performance_salary},0,0)")
    int addsalary(Salary salary);
    @Delete("delete from salary where id=#{id}")
    int deletesalary(Salary salary);
    @Update("update salary SET basic_salary=#{basic_salary},performance_salary=#{performance_salary} where id=#{id}")
    int updatesalary(Salary salary);
    @Select("SELECT id FROM user WHERE id=#{id}")
    String checkinvalid(Salary element) ;
    @Select("SELECT id FROM salary where id=#{id}")
    String checkexit(Salary element);
}

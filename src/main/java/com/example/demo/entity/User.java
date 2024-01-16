package com.example.demo.entity;
import org.springframework.core.annotation.Order;

import java.util.List;

public class User {

    String name;
    String id;
    Chuqin chuqin;
    Work work;
    Grade grade;
     int attend;
     int absence;
    float completionrate;
    float task;
    float efficiency;
    float quality;
    float attitude;
    float skill;
    float knowledge;
    double sum;

    public double getSum(){return sum;}
    public void setSum(double a){sum=a;}
   public String getID(){return id;}
    public String getName(){return name;}
    public void setAttend(int a){this.attend=a;}
    public void setAbsence(int a){this.absence=a;}

    public int getAttend(){return this.chuqin.getAttend();}
    public int getAbsence(){return this.chuqin.getAbsence();}
    public float getCompletionrate(){return this.work.completionrate;}
    public float getTask(){return this.work.task;}
    public float getEfficiency(){return this.work.efficiency;}
    public float getQuality(){return this.work.quality;}
    public float getAttitude(){return this.work.attitude;}
    public float getSkill(){return this.grade.skill_grade;}
    public  float getKnowledge(){return this.grade.know_grade;}
    public void setTask(float a){this.task=a;}
    public void setCompletionrate(float a){this.completionrate=a;}
    public void setEfficiency(float a){this.efficiency=a;}
    public void setQuality(float a){this.efficiency=a;}
    public void setAttitude(float a){this.attitude=a;}
    public void setSkill(float a){this.skill=a;}
    public void setKnowledge(float a){this.knowledge=a;}

    public void setId(String id) {
        this.id = id;
    }

    @Override
    public String toString(){

        return "User{"+"name:"+name+'\''+
                " , id:"+id+'\''+"}";

    }

}


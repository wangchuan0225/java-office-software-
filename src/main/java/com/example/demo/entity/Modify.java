package com.example.demo.entity;

import java.text.DecimalFormat;

public class Modify {
    String id;
    int attend;
    int absence;
    float completionrate;
    float task;
    float efficiency;
    float quality;
    float attitude;
    float skill;
    float knowledge;
    double performence;

    public void setPerformence() {
        double sum=completionrate*0.15+task*0.23+efficiency*0.12+attitude*0.1+
                quality*0.15+knowledge*0.1+skill*0.1-0.3*absence;
        DecimalFormat df = new DecimalFormat("#.###");
        String result = df.format(sum);
        sum=Double.parseDouble(result);
        performence=sum;    }

    public double getPerformence() {
        return performence;
    }

    public String getId(){return id;}
    public void setId(String a){id=a;}
    public int getAttend(){return attend;}
    public int getAbsence(){return absence;}
    public float getCompletionrate(){return completionrate;}
    public float getTask(){return task;}
    public float getEfficiency(){return efficiency;}
    public float getQuality(){return quality;}
    public float getAttitude(){return attitude;}
    public float getSkill(){return skill;}
    public float getKnowledge(){return knowledge;}
    public void setCompletionrate(float a){this.completionrate=a;}
    void setTask(float a){this.task=a;}
    void setEfficiency(float a){this.efficiency=a;}
    void setQuality(float a){this.quality=a;}
    void setAttitude(float a){this.attitude=a;}
    void setSkill(float a){this.skill=a;}
    void setKnowledge(float a){this.knowledge=a;}
    void setAttend(int a){this.attend=a;}
    void setAbsence(int a){this.absence=a;}
}

package com.example.demo.entity;

import java.text.DecimalFormat;

public class Addelements {
    String name;
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
    public void setPerformence()
    {
        double sum=completionrate*0.15+task*0.23+efficiency*0.12+attitude*0.1+
                quality*0.15+knowledge*0.1+skill*0.1-0.3*absence;
        DecimalFormat df = new DecimalFormat("#.###");
        String result = df.format(sum);
        sum=Double.parseDouble(result);
        performence=sum;
    }
   public double getPerformence(){return performence;}

    public String getID(){return id;}
    public String getName(){return name;}
    public void setAttend(String a){this.attend=Integer.parseInt(a);}
    public void setAbsence(String a){this.absence=Integer.parseInt(a);}

    public int getAttend(){return this.attend;}
    public int getAbsence(){return this.absence;}
    public float getCompletionrate(){return this.completionrate;}
    public float getTask(){return this.task;}
    public float getEfficiency(){return this.efficiency;}
    public float getQuality(){return this.quality;}
    public float getAttitude(){return this.attitude;}
    public float getSkill(){return this.skill;}
    public  float getKnowledge(){return this.knowledge;}
    public void setTask(String a){this.task=Float.parseFloat(a);}

    public void setCompletionrate(String a){this.completionrate=Float.parseFloat(a);}
    public void setEfficiency(String a){this.efficiency=Float.parseFloat(a);}
    public void setQuality(String a){this.quality=Float.parseFloat(a);}
    public void setAttitude(String a){this.attitude=Float.parseFloat(a);}
    public void setSkill(String a){this.skill=Float.parseFloat(a);}
    public void setKnowledge(String a){this.knowledge=Float.parseFloat(a);}
    public void setName(String a){this.name=a;}
    public void setId(String a){this.id=a;}

    @Override
    public String toString() {
        return super.toString();
    }
}

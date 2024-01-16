package com.example.demo.controlar;
import java.text.DecimalFormat;

import com.example.demo.entity.Salary;
import com.example.demo.entity.User;
import com.example.demo.entity.YourRequestData;
import com.example.demo.mapper.Salarymapper;
import com.example.demo.mapper.Showmapper;
import com.example.demo.mapper.Usermapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import com.example.demo.entity.showuser;
import java.util.List;

@RestController
@CrossOrigin
public class YourController {
    private Usermapper usermapper;
    private Showmapper showmapper;
    private Salarymapper salarymapper;
    private String id;
    @Autowired
    public YourController(Usermapper usermapper,Showmapper showmapper,Salarymapper salarymapper) {
        this.usermapper = usermapper;this.showmapper=showmapper;this.salarymapper=salarymapper;
    }
    @PostMapping("/your-backend-endpoint")
    public List<User> receiveDataFromFrontend(@RequestBody YourRequestData requestData) {
        String sentence1 = requestData.getSentence1();
        // 在这里处理接收到的数据，这里仅作为示例，你可以进行后续的逻辑处理
        System.out.println("从前端收到的数据: sentence1 - " + sentence1 );
        id = sentence1;
        List<User> list=this.usermapper.selectAllUserAndChuqin(id);
        if(list.isEmpty())
            return null;
        System.out.println(list.get(0));
        if (list.isEmpty())
            return list;
        list.get(0).setAttend(list.get(0).getAbsence());
        list.get(0).setAbsence(list.get(0).getAttend());
        list.get(0).setCompletionrate(list.get(0).getCompletionrate());
        list.get(0).setEfficiency(list.get(0).getEfficiency());
        list.get(0).setAttitude(list.get(0).getAttitude());
        list.get(0).setTask(list.get(0).getTask());
        list.get(0).setQuality(list.get(0).getQuality());
        list.get(0).setSkill(list.get(0).getSkill());
        list.get(0).setKnowledge(list.get(0).getKnowledge());
        double sum=list.get(0).getCompletionrate()*0.15+list.get(0).getTask()*0.23+list.get(0).getEfficiency()*0.12+list.get(0).getAttitude()*0.1+
                list.get(0).getQuality()*0.15+list.get(0).getKnowledge()*0.1+list.get(0).getSkill()*0.1-0.3*list.get(0).getAbsence();
        DecimalFormat df = new DecimalFormat("#.###");
        String result = df.format(sum);
        sum=Double.parseDouble(result);
        list.get(0).setSum(sum);
        System.out.println(list.get(0));
        return list;
    }
    @PostMapping("/fetchAllUser")
    public List<showuser>  fetchAllUser(){
        List<showuser> alluser=this.showmapper.fetchAllUser();
        return alluser;
    }
    @PostMapping("/selectsalary")
    public List<Salary> selectAllSalary(@RequestBody YourRequestData requestData)
    {
        String id=requestData.getSentence1();
        System.out.println(id);
        List<Salary> s1=this.salarymapper.selectAllSalary(id);
        if(s1.isEmpty())
            return null;
        s1.get(0).setActual_salary(s1.get(0).getBasic_salary()+s1.get(0).getPerformance_salary()*s1.get(0).getPerformance()/100);
        System.out.println(s1.get(0));
        return s1;
    }
    @PostMapping("/addsalary")
    public int addsalary(@RequestBody Salary salary){
        String result1=this.salarymapper.checkinvalid(salary);
        if(result1==null)
            return -1;
        result1=this.salarymapper.checkexit(salary);
        if(result1!=null)
            return -2;
       int result=this.salarymapper.addsalary(salary);
       return result;
    }
    @PostMapping("/deletesalary")
    public int deletesalary(@RequestBody Salary salary)
    {
        System.out.println(salary.getId());
        String result1=this.salarymapper.checkexit(salary);
        if(result1==null)
            return -1;
        int result=this.salarymapper.deletesalary(salary);
        return result;
    }
    @PostMapping("/updatesalary")
    public int updatesalary(@RequestBody Salary salary)
    {
        String result1=this.salarymapper.checkexit(salary);
        if(result1==null)
            return -1;
        int result=this.salarymapper.updatesalary(salary);
        return result;
    }
}

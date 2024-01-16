package com.example.demo.controlar;
import com.example.demo.entity.User;
import com.example.demo.entity.YourRequestData;
import com.example.demo.mapper.Usermapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@CrossOrigin

public class Usercontroller {
@Autowired
    private Usermapper usermapper;
    @GetMapping("/user/findall")
    public List<User> find(){
        List<User> list=usermapper.selectAllUserAndChuqin("2");
        list.get(0).setAttend(list.get(0).getAbsence());
        list.get(0).setAbsence(list.get(0).getAttend());
        list.get(0).setCompletionrate(list.get(0).getCompletionrate());
        list.get(0).setEfficiency(list.get(0).getEfficiency());
        list.get(0).setAttitude(list.get(0).getAttitude());
        list.get(0).setTask(list.get(0).getTask());
        list.get(0).setQuality(list.get(0).getQuality());
        list.get(0).setSkill(list.get(0).getSkill());
        list.get(0).setKnowledge(list.get(0).getKnowledge());
        System.out.println(list.get(0).getName());
        System.out.println(list.get(0).getID());
        return list;
    }
}

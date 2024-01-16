package com.example.demo.controlar;
import com.example.demo.entity.Addelements;
import com.example.demo.entity.Modify;
import com.example.demo.entity.YourRequestData;
import com.example.demo.mapper.Addmapper;
import com.example.demo.mapper.Salarymapper;
import com.example.demo.mapper.Usermapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@CrossOrigin
public class Addelement {
    private Addmapper addmapper;
    private Salarymapper salarymapper;
    @Autowired
    public Addelement(Addmapper addmapper,Salarymapper salarymapper) {
        this.addmapper = addmapper;this.salarymapper=salarymapper;
    }
    @PostMapping("/add")
    public int receiveAddData(@RequestBody Addelements addelements){
        System.out.println(addelements.getID());
        String check=this.addmapper.checkinvalid(addelements);
        if(check==null)
        {
            return -1;
        }
        check=this.addmapper.checkexit(addelements);
        if(check!=null)
            return -2;
        int result= this.addmapper.insertExamEntity(addelements);
        result=this.addmapper.insertWorkEntity(addelements);
        result=this.addmapper.insertChuqinEntity(addelements);
        addelements.setPerformence();
        double sum=addelements.getCompletionrate()*0.15+addelements.getTask()*0.23+addelements.getEfficiency()*0.12+addelements.getAttitude()*0.1+
                addelements.getQuality()*0.15+addelements.getKnowledge()*0.1+addelements.getSkill()*0.1-0.3*addelements.getAbsence();
        this.salarymapper.updateperformance(sum,addelements.getID());
        this.addmapper.insertperformence(addelements);
        return result;
    }
}

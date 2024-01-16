package com.example.demo.controlar;

import com.example.demo.entity.Modify;
import com.example.demo.mapper.Modifymapper;
import com.example.demo.mapper.Salarymapper;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
@RestController
@CrossOrigin
public class Modifycontroller {
    private Modifymapper modifymapper;
    private Salarymapper salarymapper;
    public Modifycontroller(Modifymapper a,Salarymapper salarymapper){this.modifymapper=a;this.salarymapper=salarymapper;}
    @PostMapping("/modify")
    public int modifyelement(@RequestBody Modify modify){
        String result1=this.modifymapper.checkid(modify);
        if(result1==null)
            return -1;
        Integer result;
         result=this.modifymapper.modifychuqin(modify);
        if(result==null)
            return -1;
        result=this.modifymapper.modifyexam(modify);
        if(result==null)
            return -1;
        result=this.modifymapper.modifywork(modify);
        if(result==-1)
            return -1;
        modify.setPerformence();
        double sum=modify.getCompletionrate()*0.15+modify.getTask()*0.23+modify.getEfficiency()*0.12+modify.getAttitude()*0.1+
                modify.getQuality()*0.15+modify.getKnowledge()*0.1+modify.getSkill()*0.1-0.3*modify.getAbsence();
        result=this.modifymapper.modifyperformence(modify);
        result=this.salarymapper.updateperformance(sum,modify.getId());
        if(result==-1)
            return -1;
        return 1;
    }


}

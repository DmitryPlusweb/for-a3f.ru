<?php
namespace plusweb;
  
class Service
{
    /**
     * 
     * @param string $url
     * @return array
     */
    public function getTagsCount($url)
    {
        $content = file_get_contents($url);
        
        if (empty($content)) {
            return ['result'=>false, 'error'=>'No content'];
        }
        
        $return = [];
        $html = $this->removeTagContent('script', $this->removeTagContent('style', $this->removeTagContent('a', $content)));
        preg_match_all('#<([a-zA-Z]?)*#is', $html, $res);
        
        foreach ($res[0] as $tag){
            $return = $this->countTags($return, $tag);
        }
        
        return ['result'=>true,  'data' => $return];
    }
    
    /**
     * 
     * @param array $return
     * @param string $tag
     * @return array
     */
    private function countTags ($return, $tag){
        
            $key = str_replace("<","",strtolower($tag));
            if (!empty($key)) {
                $return[$key] ++;
            }
            
            return $return;
    }
    
    /**
     * 
     * @param string $tag
     * @param string $content
     * @return string
     */
    private function removeTagContent($tag, $content )
    {
        return preg_replace('#<'.$tag.'[^>]*>.*?</'.$tag.'>#is', '<'.$tag.'/>', $content);
    }
    
}



<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien", indexes={@ORM\Index(name="IDX_45EDC3865B5147C8", columns={"bien_parent_id"}), @ORM\Index(name="IDX_45EDC386924DD2B5", columns={"localite_id"}), @ORM\Index(name="IDX_45EDC38695B4D7FA", columns={"type_bien_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\BienRepository")
 */

 
class Bien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomBien", type="string", length=50, nullable=false)
     */
    private $nombien;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="prixlocation", type="integer", nullable=false)
     */
    private $prixlocation;

    /**
     * @var \Bien
     *
     * @ORM\ManyToOne(targetEntity="Bien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bien_parent_id", referencedColumnName="id")
     * })
     */
    private $bienParent;

    /**
     * @var \Localite
     *
     * @ORM\ManyToOne(targetEntity="Localite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localite_id", referencedColumnName="id")
     * })
     */
    private $localite;

    /**
     * @var \TypeBien
     *
     * @ORM\ManyToOne(targetEntity="TypeBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_bien_id", referencedColumnName="id")
     * })
     */
    private $typeBien;

    /**
     * @var \Image
     *
     * @ORM\OneToMany(targetEntity="Image",mappedBy="bien")
     */
    private $images;



    /**
     * Get the value of nombien
     *
     * @return  string
     */ 
    public function getNombien()
    {
        return $this->nombien;
    }

    /**
     * Set the value of nombien
     *
     * @param  string  $nombien
     *
     * @return  self
     */ 
    public function setNombien(string $nombien)
    {
        $this->nombien = $nombien;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of etat
     *
     * @return  bool
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @param  bool  $etat
     *
     * @return  self
     */ 
    public function setEtat(bool $etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prixlocation
     *
     * @return  int
     */ 
    public function getPrixlocation()
    {
        return $this->prixlocation;
    }

    /**
     * Set the value of prixlocation
     *
     * @param  int  $prixlocation
     *
     * @return  self
     */ 
    public function setPrixlocation(int $prixlocation)
    {
        $this->prixlocation = $prixlocation;

        return $this;
    }

     /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
    * Set the value of images
    *
    * @return  self
    */ 
   public function setImages($images)
   {
      $this->images = $images;

      return $this;
   }

    
}
